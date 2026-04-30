/**
 * Unified Visibility Panel
 *
 * Consolidates all block visibility, accessibility, user, schedule,
 * display, and responsive layout controls into a single sidebar panel.
 *
 * Sources merged:
 *  - visibility-toggles.js  (theme — Screen Size, Custom Breakpoints,
 *    Browser & Device, Lockdown, Query String, Specific Users,
 *    Accessibility, User Status, User Roles, Schedule)
 *  - visibility.js          (pro — Post Meta, Required Plugins, Cookie)
 *  - editor.js              (theme — Display panel with breakpoint switcher)
 *  - query-enhancements-editor.js (theme — Responsive Layout for core/query)
 *
 * @package Aegis\Framework
 * @since   2.0.0
 */
!(function (wp) {
  "use strict";

  /* ------------------------------------------------------------------ */
  /*  WordPress dependencies                                             */
  /* ------------------------------------------------------------------ */
  const { addFilter } = wp.hooks;
  const { createHigherOrderComponent } = wp.compose;
  const { Fragment, createElement: el, useState } = wp.element;
  const { InspectorControls } = wp.blockEditor;
  const {
    PanelBody,
    ToggleControl,
    SelectControl,
    Button,
    ButtonGroup,
    Flex,
    FlexItem,
    TextControl,
    FormTokenField,
    __experimentalNumberControl: NumberControl,
  } = wp.components;
  const { __ } = wp.i18n;

  /* ------------------------------------------------------------------ */
  /*  Localized data                                                     */
  /* ------------------------------------------------------------------ */
  const settings = window.aegis?.conditionalLogicSettings || {
    visibility: {
      screen_size: false,
      custom_breakpoints: false,
      browser_device: false,
      lockdown: false,
      query_string: false,
      specific_users: false,
    },
    accessibility: {
      reduced_motion: false,
      screen_reader_only: false,
      color_scheme: false,
      high_contrast: false,
      forced_colors: false,
    },
    user: { user_status: false, user_role: false },
    schedule: { date_time: false },
  };

  const proData = window.AegisVisibility || null;

  /* ------------------------------------------------------------------ */
  /*  Option arrays                                                      */
  /* ------------------------------------------------------------------ */
  const QUERY_OPERATORS = [
    { label: __("is", "aegis"), value: "is" },
    { label: __("is not", "aegis"), value: "isNot" },
    { label: __("exists", "aegis"), value: "exists" },
    { label: __("does not exist", "aegis"), value: "notExists" },
    { label: __("contains", "aegis"), value: "contains" },
  ];

  const SHOW_HIDE = [
    { label: __("Show when matched", "aegis"), value: "show" },
    { label: __("Hide when matched", "aegis"), value: "hide" },
  ];

  const RELATION = [
    { label: __("All rules must match", "aegis"), value: "all" },
    { label: __("Any rule must match", "aegis"), value: "any" },
  ];


  const IS_ISNOT = [
    { label: __("is", "aegis"), value: "is" },
    { label: __("is not", "aegis"), value: "isNot" },
  ];

  const COLOR_SCHEMES = [
    { label: __("Both", "aegis"), value: "" },
    { label: __("Light Mode Only", "aegis"), value: "light" },
    { label: __("Dark Mode Only", "aegis"), value: "dark" },
  ];

  const USER_STATUS_OPTIONS = [
    { label: __("All Users", "aegis"), value: "" },
    { label: __("Logged In Only", "aegis"), value: "logged_in" },
    { label: __("Logged Out Only", "aegis"), value: "logged_out" },
  ];

  const wpRoles = (window.aegis?.userRoles || []).map(function (r) {
    return { label: r.label, value: r.value };
  });
  const ROLE_OPTIONS = [
    { label: __("Select Role...", "aegis"), value: "" },
    ...wpRoles,
  ];

  const EXCLUDED_BLOCKS = ["core/freeform", "core/html", "core/missing", "aegis/conditional"];

  /* ------------------------------------------------------------------ */
  /*  Section heading style                                              */
  /* ------------------------------------------------------------------ */
  const headingStyle = {
    fontSize: "11px",
    fontWeight: 500,
    textTransform: "uppercase",
    marginBottom: "12px",
    marginTop: 0,
    color: "#1e1e1e",
  };

  function Divider({ first }) {
    if (first) return null;
    return el("hr", {
      style: {
        borderTop: "1px solid #e0e0e0",
        borderBottom: "none",
        margin: "16px 0",
      },
    });
  }

  /* ------------------------------------------------------------------ */
  /*  Repeater-row components                                            */
  /* ------------------------------------------------------------------ */
  function QueryStringRule({ rule, index, onUpdate, onRemove }) {
    const showValue =
      rule.operator !== "exists" && rule.operator !== "notExists";
    return el(
      "div",
      {
        style: {
          marginBottom: "12px",
          padding: "12px",
          backgroundColor: "#f6f7f7",
          borderRadius: "4px",
        },
      },
      el(
        Flex,
        { align: "flex-end", style: { marginBottom: "8px" } },
        el(
          FlexItem,
          { style: { flex: 1 } },
          el(TextControl, {
            label: __("Parameter", "aegis"),
            value: rule.param || "",
            placeholder: "e.g. utm_source",
            onChange: function (v) {
              onUpdate(index, { ...rule, param: v });
            },
            __nextHasNoMarginBottom: true,
          })
        ),
        el(
          FlexItem,
          { style: { flex: 1 } },
          el(SelectControl, {
            label: __("Operator", "aegis"),
            value: rule.operator || "is",
            options: QUERY_OPERATORS,
            onChange: function (v) {
              onUpdate(index, { ...rule, operator: v });
            },
            __nextHasNoMarginBottom: true,
          })
        ),
        el(
          FlexItem,
          {},
          el(Button, {
            icon: "no-alt",
            isSmall: true,
            isDestructive: true,
            onClick: function () {
              onRemove(index);
            },
            label: __("Remove rule", "aegis"),
          })
        )
      ),
      showValue &&
        el(TextControl, {
          label: __("Value", "aegis"),
          value: rule.value || "",
          placeholder: "e.g. google",
          onChange: function (v) {
            onUpdate(index, { ...rule, value: v });
          },
          __nextHasNoMarginBottom: true,
        })
    );
  }

  function UserRoleRule({ rule, index, onUpdate, onRemove }) {
    return el(
      "div",
      {
        style: {
          display: "flex",
          gap: "8px",
          marginBottom: "8px",
          alignItems: "flex-start",
        },
      },
      el(SelectControl, {
        value: rule.role || "",
        options: ROLE_OPTIONS,
        onChange: function (v) {
          onUpdate(index, { ...rule, role: v });
        },
        __nextHasNoMarginBottom: true,
        style: { flex: 1 },
      }),
      el(SelectControl, {
        value: rule.operator || "is",
        options: IS_ISNOT,
        onChange: function (v) {
          onUpdate(index, { ...rule, operator: v });
        },
        __nextHasNoMarginBottom: true,
        style: { width: "80px" },
      }),
      el(Button, {
        icon: "no-alt",
        isSmall: true,
        isDestructive: true,
        onClick: function () {
          onRemove(index);
        },
        label: __("Remove", "aegis"),
      })
    );
  }

  function BreakpointRule({ rule, index, onUpdate, onRemove }) {
    return el(
      "div",
      {
        style: {
          marginBottom: "12px",
          padding: "12px",
          backgroundColor: "#f6f7f7",
          borderRadius: "4px",
        },
      },
      el(
        Flex,
        { align: "flex-end", style: { marginBottom: "8px" } },
        el(
          FlexItem,
          { style: { flex: 1 } },
          el(TextControl, {
            label: __("Min Width (px)", "aegis"),
            type: "number",
            value: rule.minWidth || "",
            onChange: function (v) {
              onUpdate(index, { ...rule, minWidth: v });
            },
            __nextHasNoMarginBottom: true,
          })
        ),
        el(
          FlexItem,
          { style: { flex: 1 } },
          el(TextControl, {
            label: __("Max Width (px)", "aegis"),
            type: "number",
            value: rule.maxWidth || "",
            onChange: function (v) {
              onUpdate(index, { ...rule, maxWidth: v });
            },
            __nextHasNoMarginBottom: true,
          })
        ),
        el(
          FlexItem,
          {},
          el(Button, {
            icon: "no-alt",
            isSmall: true,
            isDestructive: true,
            onClick: function () {
              onRemove(index);
            },
            label: __("Remove breakpoint", "aegis"),
          })
        )
      ),
      el(
        "p",
        { style: { fontSize: "12px", color: "#757575", margin: 0 } },
        rule.minWidth && rule.maxWidth
          ? __("Hide between ", "aegis") +
              rule.minWidth +
              "px - " +
              rule.maxWidth +
              "px"
          : rule.minWidth
            ? __("Hide above ", "aegis") + rule.minWidth + "px"
            : rule.maxWidth
              ? __("Hide below ", "aegis") + rule.maxWidth + "px"
              : __("Enter min and/or max width", "aegis")
      )
    );
  }


  /* ------------------------------------------------------------------ */
  /*  Attribute registration                                             */
  /* ------------------------------------------------------------------ */
  addFilter(
    "blocks.registerBlockType",
    "aegis/visibility-attributes",
    function (blockSettings, blockName) {
      if (EXCLUDED_BLOCKS.includes(blockName)) return blockSettings;
      if (blockSettings.attributes) {
        blockSettings.attributes = {
          ...blockSettings.attributes,
          visibility: { type: "object", default: {} },
        };
      }
      return blockSettings;
    }
  );

  /* ------------------------------------------------------------------ */
  /*  Main HOC                                                           */
  /* ------------------------------------------------------------------ */
  addFilter(
    "editor.BlockEdit",
    "aegis/visibility-controls",
    createHigherOrderComponent(function (BlockEdit) {
      return function (props) {
        const { attributes, setAttributes, isSelected, name: blockName } =
          props;
        const vis = attributes.visibility || {};

        /* ---- Convenience updater ---------------------------------- */
        function setVis(key, value) {
          setAttributes({ visibility: { ...vis, [key]: value } });
        }

        /* ---- Array helpers for repeaters -------------------------- */
        function addRule(key, template) {
          setVis(key, [...(vis[key] || []), template]);
        }
        function updateRule(key, index, updated) {
          const arr = [...(vis[key] || [])];
          arr[index] = updated;
          setVis(key, arr);
        }
        function removeRule(key, index) {
          setVis(
            key,
            (vis[key] || []).filter(function (_, i) {
              return i !== index;
            })
          );
        }

        /* ---- Feature flags ---------------------------------------- */
        const hasVis =
          settings.visibility.screen_size ||
          settings.visibility.custom_breakpoints ||
          settings.visibility.lockdown ||
          settings.visibility.query_string ||
          settings.visibility.specific_users;

        const hasA11y =
          settings.accessibility.reduced_motion ||
          settings.accessibility.screen_reader_only ||
          settings.accessibility.color_scheme ||
          settings.accessibility.high_contrast ||
          settings.accessibility.forced_colors;

        const hasUser =
          settings.user.user_status || settings.user.user_role;

        const hasSchedule = settings.schedule.date_time;
        const hasPro = !!proData;

        const hasAnything =
          hasVis || hasA11y || hasUser || hasSchedule ||
          hasPro;

        if (!hasAnything || !isSelected || EXCLUDED_BLOCKS.includes(blockName)) {
          return el(Fragment, null, el(BlockEdit, props));
        }

        /* ============================================================ */
        /*  Build sections                                               */
        /* ============================================================ */
        const sections = [];
        let first = true;

        /* -- 1. Screen Size ----------------------------------------- */
        if (settings.visibility.screen_size) {
          sections.push(
            el("div", { key: "screen-size", className: "aegis-visibility-section" },
              el(Divider, { first: first }),
              el("h3", { style: headingStyle }, __("Screen Size", "aegis")),
              el(ToggleControl, {
                label: __("Hide on Mobile", "aegis"),
                help: __("Screens smaller than 480px", "aegis"),
                checked: !!vis.hideOnMobile,
                onChange: function (v) { setVis("hideOnMobile", v); },
              }),
              el(ToggleControl, {
                label: __("Hide on Tablet", "aegis"),
                help: __("Screens 768px - 1023px", "aegis"),
                checked: !!vis.hideOnTablet,
                onChange: function (v) { setVis("hideOnTablet", v); },
              }),
              el(ToggleControl, {
                label: __("Hide on Desktop", "aegis"),
                help: __("Screens 1024px and larger", "aegis"),
                checked: !!vis.hideOnDesktop,
                onChange: function (v) { setVis("hideOnDesktop", v); },
              })
            )
          );
          first = false;
        }

        /* -- 2. Custom Breakpoints ---------------------------------- */
        if (settings.visibility.custom_breakpoints) {
          const bps = vis.customBreakpoints || [];
          sections.push(
            el("div", { key: "custom-bp", className: "aegis-visibility-section" },
              el(Divider, { first: first }),
              el("h3", { style: headingStyle }, __("Custom Breakpoints", "aegis")),
              bps.length > 0 &&
                bps.map(function (rule, i) {
                  return el(BreakpointRule, {
                    key: i, rule: rule, index: i,
                    onUpdate: function (idx, u) { updateRule("customBreakpoints", idx, u); },
                    onRemove: function (idx) { removeRule("customBreakpoints", idx); },
                  });
                }),
              el(Button, {
                variant: "secondary", isSmall: true,
                onClick: function () { addRule("customBreakpoints", { minWidth: "", maxWidth: "" }); },
                style: { marginTop: "8px" },
              }, __("Add Breakpoint", "aegis"))
            )
          );
          first = false;
        }

        
        /* -- 4. Lockdown -------------------------------------------- */
        if (settings.visibility.lockdown) {
          sections.push(
            el("div", { key: "lockdown", className: "aegis-visibility-section" },
              el(Divider, { first: first }),
              el("h3", { style: headingStyle }, __("Lockdown", "aegis")),
              el(ToggleControl, {
                label: __("Hide from All Users", "aegis"),
                help: __("Block will be hidden on the frontend for everyone. Useful for draft content on live pages.", "aegis"),
                checked: !!vis.hideFromAll,
                onChange: function (v) { setVis("hideFromAll", v); },
              })
            )
          );
          first = false;
        }

        /* -- 5. URL Query String ------------------------------------ */
        if (settings.visibility.query_string) {
          const qs = vis.queryStringRules || [];
          sections.push(
            el("div", { key: "query-string", className: "aegis-visibility-section" },
              el(Divider, { first: first }),
              el("h3", { style: headingStyle }, __("URL Query String", "aegis")),
              el(SelectControl, {
                label: __("Logic", "aegis"),
                value: vis.queryStringLogic || "show",
                options: SHOW_HIDE,
                onChange: function (v) { setVis("queryStringLogic", v); },
                __nextHasNoMarginBottom: true,
              }),
              qs.length > 1 &&
                el(SelectControl, {
                  label: __("Relation", "aegis"),
                  value: vis.queryStringRelation || "all",
                  options: RELATION,
                  onChange: function (v) { setVis("queryStringRelation", v); },
                  __nextHasNoMarginBottom: true,
                }),
              qs.length > 0 &&
                qs.map(function (rule, i) {
                  return el(QueryStringRule, {
                    key: i, rule: rule, index: i,
                    onUpdate: function (idx, u) { updateRule("queryStringRules", idx, u); },
                    onRemove: function (idx) { removeRule("queryStringRules", idx); },
                  });
                }),
              el(Button, {
                variant: "secondary", isSmall: true,
                onClick: function () { addRule("queryStringRules", { param: "", operator: "is", value: "" }); },
                style: { marginTop: "8px" },
              }, __("Add Rule", "aegis"))
            )
          );
          first = false;
        }

        /* -- 6. Specific Users -------------------------------------- */
        if (settings.visibility.specific_users) {
          sections.push(
            el("div", { key: "specific-users", className: "aegis-visibility-section" },
              el(Divider, { first: first }),
              el("h3", { style: headingStyle }, __("Specific Users", "aegis")),
              el(SelectControl, {
                label: __("Logic", "aegis"),
                value: vis.specificUsersLogic || "show",
                options: [
                  { label: __("Show only to these users", "aegis"), value: "show" },
                  { label: __("Hide from these users", "aegis"), value: "hide" },
                ],
                onChange: function (v) { setVis("specificUsersLogic", v); },
                __nextHasNoMarginBottom: true,
              }),
              el(TextControl, {
                label: __("User IDs", "aegis"),
                help: __("Comma-separated list of user IDs (e.g. 1, 5, 12)", "aegis"),
                value: vis.specificUserIds || "",
                onChange: function (v) { setVis("specificUserIds", v); },
              })
            )
          );
          first = false;
        }

        /* -- 7. Accessibility --------------------------------------- */
        if (hasA11y) {
          const acc = [];
          if (settings.accessibility.reduced_motion) {
            acc.push(el(ToggleControl, {
              key: "rm", label: __("Hide with Reduced Motion", "aegis"),
              help: __("Hide when user prefers reduced motion", "aegis"),
              checked: !!vis.hideReducedMotion,
              onChange: function (v) { setVis("hideReducedMotion", v); },
            }));
          }
          if (settings.accessibility.screen_reader_only) {
            acc.push(el(ToggleControl, {
              key: "sr", label: __("Screen Reader Only", "aegis"),
              help: __("Visually hidden but accessible to screen readers", "aegis"),
              checked: !!vis.screenReaderOnly,
              onChange: function (v) { setVis("screenReaderOnly", v); },
            }));
          }
          if (settings.accessibility.color_scheme) {
            acc.push(el(SelectControl, {
              key: "cs", label: __("Color Scheme", "aegis"),
              help: __("Show block only in specific color scheme", "aegis"),
              value: vis.colorScheme || "", options: COLOR_SCHEMES,
              onChange: function (v) { setVis("colorScheme", v); },
              __nextHasNoMarginBottom: true,
            }));
          }
          if (settings.accessibility.high_contrast) {
            acc.push(el(ToggleControl, {
              key: "hc", label: __("Hide in High Contrast", "aegis"),
              help: __("Hide when user prefers high contrast", "aegis"),
              checked: !!vis.hideHighContrast,
              onChange: function (v) { setVis("hideHighContrast", v); },
            }));
          }
          if (settings.accessibility.forced_colors) {
            acc.push(el(ToggleControl, {
              key: "fc", label: __("Hide in Forced Colors", "aegis"),
              help: __("Hide when forced colors mode is active (Windows High Contrast)", "aegis"),
              checked: !!vis.hideForcedColors,
              onChange: function (v) { setVis("hideForcedColors", v); },
            }));
          }
          sections.push(
            el("div", { key: "accessibility", className: "aegis-visibility-section" },
              el(Divider, { first: first }),
              el("h3", { style: headingStyle }, __("Accessibility", "aegis")),
              ...acc
            )
          );
          first = false;
        }

        /* -- 8. User Status ----------------------------------------- */
        if (settings.user.user_status) {
          sections.push(
            el("div", { key: "user-status", className: "aegis-visibility-section" },
              el(Divider, { first: first }),
              el("h3", { style: headingStyle }, __("User Status", "aegis")),
              el(SelectControl, {
                label: __("User Status", "aegis"),
                help: __("Show block based on login status", "aegis"),
                value: vis.userStatus || "",
                options: USER_STATUS_OPTIONS,
                onChange: function (v) { setVis("userStatus", v); },
                __nextHasNoMarginBottom: true,
              })
            )
          );
          first = false;
        }

        /* -- 9. User Roles ------------------------------------------ */
        if (settings.user.user_role) {
          const rr = vis.userRoleRules || [];
          sections.push(
            el("div", { key: "user-roles", className: "aegis-visibility-section" },
              el(Divider, { first: first }),
              el("h3", { style: headingStyle }, __("User Roles", "aegis")),
              rr.length > 0 &&
                rr.map(function (rule, i) {
                  return el(UserRoleRule, {
                    key: i, rule: rule, index: i,
                    onUpdate: function (idx, u) { updateRule("userRoleRules", idx, u); },
                    onRemove: function (idx) { removeRule("userRoleRules", idx); },
                  });
                }),
              el(Button, {
                variant: "secondary", isSmall: true,
                onClick: function () { addRule("userRoleRules", { role: "", operator: "is" }); },
                style: { marginTop: "8px" },
              }, __("Add Role Rule", "aegis"))
            )
          );
          first = false;
        }

        /* -- 10. Schedule ------------------------------------------- */
        if (hasSchedule) {
          sections.push(
            el("div", { key: "schedule", className: "aegis-visibility-section" },
              el(Divider, { first: first }),
              el("h3", { style: headingStyle }, __("Schedule", "aegis")),
              el(TextControl, {
                label: __("Start Date/Time", "aegis"),
                help: __("Show block starting from this date/time (YYYY-MM-DD HH:MM)", "aegis"),
                value: vis.scheduleStart || "",
                onChange: function (v) { setVis("scheduleStart", v); },
                type: "datetime-local",
              }),
              el(TextControl, {
                label: __("End Date/Time", "aegis"),
                help: __("Hide block after this date/time (YYYY-MM-DD HH:MM)", "aegis"),
                value: vis.scheduleEnd || "",
                onChange: function (v) { setVis("scheduleEnd", v); },
                type: "datetime-local",
              })
            )
          );
          first = false;
        }

        /* -- 11. Post Meta (pro) ------------------------------------ */
        if (hasPro) {
          const metaSuggestions = (window.Aegis?.postMeta || []).map(String);
          const metaValue = (vis.postMeta || []).map(function (item) {
            return typeof item === "object" ? item.value || item.label : item;
          });
          sections.push(
            el("div", { key: "post-meta", className: "aegis-visibility-section" },
              el(Divider, { first: first }),
              el("h3", { style: headingStyle }, __("Post Meta", "aegis")),
              el("p", {
                className: "aegis-control-description",
                style: { fontSize: "12px", color: "rgb(117, 117, 117)" },
              }, __("Custom field or post meta keys that must exist and have a true value for this block to be displayed.", "aegis")),
              el(FormTokenField, {
                value: metaValue,
                suggestions: metaSuggestions,
                onChange: function (tokens) {
                  setVis("postMeta", tokens.map(function (t) { return { value: t, label: t }; }));
                },
                placeholder: __("Enter custom field key", "aegis"),
                __experimentalExpandOnFocus: true,
                __experimentalAutoSelectFirstMatch: true,
              })
            )
          );
          first = false;

          
          /* -- 13. Cookie (pro) --------------------------------------- */
          sections.push(
            el("div", { key: "cookie", className: "aegis-visibility-section" },
              el(Divider, { first: first }),
              el("h3", { style: headingStyle }, __("Limit by Cookie", "aegis")),
              el("p", {
                className: "aegis-control-description",
                style: { fontSize: "12px", color: "rgb(117, 117, 117)" },
              }, __("Hide block if the following cookie is equal to a given value.", "aegis")),
              el(TextControl, {
                label: __("Cookie name", "aegis"),
                placeholder: __("Cookie name", "aegis"),
                value: vis.cookieName || "",
                onChange: function (v) { setVis("cookieName", v); },
              }),
              el(TextControl, {
                label: __("Cookie value", "aegis"),
                placeholder: __("Cookie value", "aegis"),
                value: vis.cookieValue || "",
                onChange: function (v) { setVis("cookieValue", v); },
              })
            )
          );
          first = false;
        }


        /* ============================================================ */
        /*  Render                                                       */
        /* ============================================================ */
        return el(
          Fragment,
          null,
          el(BlockEdit, props),
          el(
            InspectorControls,
            null,
            el(
              PanelBody,
              {
                title: __("Visibility", "aegis"),
                initialOpen: false,
                className: "aegis-visibility-panel",
              },
              sections
            )
          )
        );
      };
    }, "withVisibilityControls"),
    100
  );
})(window.wp);
