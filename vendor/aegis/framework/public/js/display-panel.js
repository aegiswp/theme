/**
 * Display Panel - Block Editor Extension
 *
 * Provides a separate Display panel in the Block Editor sidebar with:
 *  - Device & Browser rules (all blocks)
 *  - Display/Order/Width controls (blocks with aegisPosition support)
 *  - Columns (Mobile), Row Gap, Equal Height Cards (core/query blocks)
 *
 * @package Aegis
 * @since   1.0.0
 */

(function () {
  "use strict";

  const { createElement: el, Fragment, useState } = wp.element;
  const { InspectorControls } = wp.blockEditor;
  const {
    PanelBody,
    SelectControl,
    Button,
    ButtonGroup,
    Flex,
    FlexItem,
    TextControl,
    ToggleControl,
    __experimentalNumberControl: NumberControl,
    __experimentalUnitControl: UnitControl,
  } = wp.components;
  const { __ } = wp.i18n;
  
  // Icons
  const { close } = wp.components;
  const { addFilter, removeFilter } = wp.hooks;
  const { createHigherOrderComponent } = wp.compose;

  if (!el || !InspectorControls || !PanelBody) return;

  /* ------------------------------------------------------------------ */
  /*  Shared data                                                        */
  /* ------------------------------------------------------------------ */
  const blockSupports = window.aegis?.blockSupports || {};
  const responsiveOptions = window.aegis?.responsiveOptions || {};

  const CSS_UNITS = [
    { value: "px", label: "px" },
    { value: "%", label: "%" },
    { value: "em", label: "em" },
    { value: "rem", label: "rem" },
    { value: "vw", label: "vw" },
    { value: "vh", label: "vh" },
  ];

  const DEVICES = [
    { label: __("Select...", "aegis"), value: "" },
    { label: __("iOS", "aegis"), value: "ios" },
    { label: __("Android", "aegis"), value: "android" },
    { label: __("Chrome", "aegis"), value: "chrome" },
    { label: __("Safari", "aegis"), value: "safari" },
    { label: __("Firefox", "aegis"), value: "firefox" },
    { label: __("Edge", "aegis"), value: "edge" },
  ];

  const IS_ISNOT = [
    { label: __("is", "aegis"), value: "is" },
    { label: __("is not", "aegis"), value: "isNot" },
  ];

  const headingStyle = { fontSize: "11px", fontWeight: 500, textTransform: "uppercase", marginBottom: "12px" };

  /* ------------------------------------------------------------------ */
  /*  Helpers                                                            */
  /* ------------------------------------------------------------------ */
  function hasPositionSupport(name) {
    return !!blockSupports?.[name]?.aegisPosition;
  }

  /* ------------------------------------------------------------------ */
  /*  Device rule sub-component                                          */
  /* ------------------------------------------------------------------ */
  function DeviceRule({ rule, index, onUpdate, onRemove }) {
    return el(
      Flex,
      { align: "flex-start", style: { marginBottom: "8px" } },
      el(
        FlexItem,
        { style: { flex: 1 } },
        el(SelectControl, {
          value: rule.device || "",
          options: DEVICES,
          onChange: function (v) {
            onUpdate(index, { ...rule, device: v });
          },
          __nextHasNoMarginBottom: true,
        })
      ),
      el(
        FlexItem,
        { style: { flex: 1 } },
        el(SelectControl, {
          value: rule.operator || "is",
          options: IS_ISNOT,
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
          icon: close,
          isSmall: true,
          isDestructive: true,
          onClick: function () {
            onRemove(index);
          },
          label: __("Remove rule", "aegis"),
        })
      )
    );
  }

  /* ------------------------------------------------------------------ */
  /*  Display controls sub-component (breakpoint-aware)                  */
  /* ------------------------------------------------------------------ */
  function DisplayControls({ attributes, setAttributes, screen }) {
    const style = attributes.style || {};
    return el(
      Fragment,
      null,
      el(
        Flex,
        { className: "aegis-flex-controls" },
        el(
          FlexItem,
          null,
          el(SelectControl, {
            label: __("Display", "aegis"),
            value: style.display?.[screen] ?? "",
            options: responsiveOptions?.display?.options ?? [],
            onChange: function (v) {
              const gridValues = ["grid", "inline-grid"];
              setAttributes({
                style: {
                  ...style,
                  display: { ...style.display, [screen]: v },
                },
              });
              if (gridValues.includes(v)) {
                setAttributes({
                  layout: {
                    ...attributes.layout,
                    type: "flex",
                    flexWrap: "nowrap",
                    orientation: "grid",
                  },
                });
              } else {
                setAttributes({
                  layout: {
                    ...attributes.layout,
                    orientation: "horizontal",
                  },
                });
              }
            },
            __nextHasNoMarginBottom: true,
          })
        ),
        el(
          FlexItem,
          null,
          el(NumberControl, {
            label: __("Order", "aegis"),
            value: style.order?.[screen] ?? "",
            onChange: function (v) {
              setAttributes({
                style: {
                  ...style,
                  order: { ...style.order, [screen]: v },
                },
              });
            },
            min: -10,
            max: 10,
            step: 1,
            allowReset: true,
          })
        )
      ),
      el(
        Flex,
        { className: "aegis-flex-controls" },
        el(
          FlexItem,
          null,
          el(UnitControl, {
            label: __("Width", "aegis"),
            value: style.width?.[screen]?.includes("auto")
              ? ""
              : style.width?.[screen],
            units: CSS_UNITS,
            onChange: function (v) {
              setAttributes({
                style: {
                  ...style,
                  width: {
                    ...style.width,
                    [screen]: v?.includes("auto") ? "auto" : v,
                  },
                },
              });
            },
          })
        ),
        el(
          FlexItem,
          null,
          el(UnitControl, {
            label: __("Min Width", "aegis"),
            value: style.minWidth?.[screen],
            units: CSS_UNITS,
            onChange: function (v) {
              setAttributes({
                style: {
                  ...style,
                  minWidth: { ...style.minWidth, [screen]: v },
                },
              });
            },
          })
        ),
        el(
          FlexItem,
          null,
          el(UnitControl, {
            label: __("Max Width", "aegis"),
            value: style.maxWidth?.[screen],
            units: CSS_UNITS,
            onChange: function (v) {
              setAttributes({
                style: {
                  ...style,
                  maxWidth: { ...style.maxWidth, [screen]: v },
                },
              });
            },
          })
        )
      )
    );
  }

  /* ------------------------------------------------------------------ */
  /*  Remove legacy Display panel registered by the bundled editor.js    */
  /* ------------------------------------------------------------------ */
  removeFilter("editor.BlockEdit", "aegis/display-controls");

  /* ------------------------------------------------------------------ */
  /*  Main HOC — adds "Display" panel to every block                     */
  /* ------------------------------------------------------------------ */
  addFilter(
    "editor.BlockEdit",
    "aegis/display-panel",
    createHigherOrderComponent(function (BlockEdit) {
      return function (props) {
        const { attributes, setAttributes, name } = props;
        const vis = attributes.visibility || {};
        const isQuery = name === "core/query";
        const hasDisplay = hasPositionSupport(name);
        const settings = window.aegis?.conditionalLogicSettings || {};
        const hasBrowserDevice = !!settings.visibility?.browser_device;

        const [dScreen, setDScreen] = useState("all");

        /* ---- Visibility helpers (scoped like the Visibility panel) -- */
        function setVis(key, value) {
          setAttributes({ visibility: { ...vis, [key]: value } });
        }
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

        /* ---- Sections ---------------------------------------------- */
        const sections = [];

        /* Device & Browser */
        if (hasBrowserDevice) {
          const dr = vis.deviceRules || [];
          sections.push(
            el("div", { key: "browser-device", className: "aegis-visibility-section" },
              el("h3", { style: headingStyle }, __("Browser & Device", "aegis")),
              dr.length > 0 &&
                dr.map(function (rule, i) {
                  return el(DeviceRule, {
                    key: i, rule: rule, index: i,
                    onUpdate: function (idx, u) { updateRule("deviceRules", idx, u); },
                    onRemove: function (idx) { removeRule("deviceRules", idx); },
                  });
                }),
              el(Button, {
                variant: "secondary", isSmall: true,
                onClick: function () { addRule("deviceRules", { device: "", operator: "is" }); },
                style: { marginTop: "8px" },
              }, __("Add Rule", "aegis"))
            )
          );
        }

        /* Display / Position controls */
        if (hasDisplay) {
          sections.push(
            el("div", { key: "display-controls" },
              el(Flex, { align: "center", justify: "space-between", style: { marginBottom: "12px" } },
                el("h3", { style: headingStyle }, __("Position & Sizing", "aegis")),
                el(ButtonGroup, null,
                  el(Button, {
                    isSmall: true,
                    variant: dScreen === "all" ? "primary" : "secondary",
                    onClick: function () { setDScreen("all"); },
                  }, __("All", "aegis")),
                  el(Button, {
                    isSmall: true,
                    variant: dScreen === "mobile" ? "primary" : "secondary",
                    onClick: function () { setDScreen("mobile"); },
                    icon: "smartphone",
                  }),
                  el(Button, {
                    isSmall: true,
                    variant: dScreen === "desktop" ? "primary" : "secondary",
                    onClick: function () { setDScreen("desktop"); },
                    icon: "desktop",
                  })
                )
              ),
              el(DisplayControls, {
                attributes: attributes,
                setAttributes: setAttributes,
                screen: dScreen,
              }),
              el(Button, {
                isSmall: true, isDestructive: true, variant: "tertiary",
                onClick: function () {
                  setAttributes({
                    style: {
                      ...attributes.style,
                      display: undefined,
                      order: undefined,
                      width: undefined,
                      minWidth: undefined,
                      maxWidth: undefined,
                    },
                  });
                },
                style: { marginTop: "8px" },
              }, __("Reset Display", "aegis"))
            )
          );
        }

        /* Query-specific controls */
        if (isQuery) {
          sections.push(
            el("div", { key: "query-display" },
              el("h3", { style: headingStyle }, __("Query Layout", "aegis")),
              el(NumberControl, {
                label: __("Columns (Mobile)", "aegis"),
                value: attributes.aegisColumnsMobile || 1,
                onChange: function (v) { setAttributes({ aegisColumnsMobile: v }); },
                min: 1,
                max: 6,
              }),
              el(NumberControl, {
                label: __("Columns (Tablet)", "aegis"),
                value: attributes.aegisColumnsTablet || 2,
                onChange: function (v) { setAttributes({ aegisColumnsTablet: v }); },
                min: 1,
                max: 6,
              }),
              el(NumberControl, {
                label: __("Columns (Desktop)", "aegis"),
                value: attributes.aegisColumnsDesktop || 3,
                onChange: function (v) { setAttributes({ aegisColumnsDesktop: v }); },
                min: 1,
                max: 6,
              }),
              el(TextControl, {
                label: __("Row Gap", "aegis"),
                value: attributes.aegisRowGap || "",
                onChange: function (v) { setAttributes({ aegisRowGap: v }); },
                placeholder: __("e.g., 2rem, 20px", "aegis"),
              }),
              el(TextControl, {
                label: __("Column Gap", "aegis"),
                value: attributes.aegisColumnGap || "",
                onChange: function (v) { setAttributes({ aegisColumnGap: v }); },
                placeholder: __("e.g., 2rem, 20px", "aegis"),
              }),
              el(ToggleControl, {
                label: __("Equal Height Cards", "aegis"),
                help: __("Force all cards to have equal height.", "aegis"),
                checked: attributes.aegisEqualHeight || false,
                onChange: function (v) { setAttributes({ aegisEqualHeight: v }); },
              }),
              el(ToggleControl, {
                label: __("Featured First Post", "aegis"),
                help: __("Make the first post span multiple columns.", "aegis"),
                checked: attributes.aegisFeaturedFirst || false,
                onChange: function (v) { setAttributes({ aegisFeaturedFirst: v }); },
              }),
              attributes.aegisFeaturedFirst &&
                el(NumberControl, {
                  label: __("Featured Span", "aegis"),
                  value: attributes.aegisFeaturedFirstSpan || 2,
                  onChange: function (v) { setAttributes({ aegisFeaturedFirstSpan: v }); },
                  min: 2,
                  max: 6,
                })
            )
          );
        }

        /* If no sections, just render the block */
        if (sections.length === 0) {
          return el(BlockEdit, props);
        }

        return el(
          Fragment,
          null,
          el(BlockEdit, props),
          el(
            InspectorControls,
            null,
            el(
              PanelBody,
              { title: __("Display", "aegis"), initialOpen: false },
              sections
            )
          )
        );
      };
    }, "withDisplayPanel")
  );
})();
