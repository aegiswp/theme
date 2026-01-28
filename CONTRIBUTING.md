# Contributing

Thank you for considering contributing to the Aegis Block Theme! Whether you are interested in enhancing the theme's functionality with new features, creating new block patterns specifically tailored for Aegis, refining its global styles, improving the theme's code, or participating in beta testing, your contributions are always welcome.

Aegis is built to fully utilize WordPress's Full Site Editing (FSE) capabilities, allowing for extensive customization directly within the block editor. Contributions can help enhance the theme's flexibility, performance, and user experience, making it even more robust and versatile for a diverse range of users.

To ensure a productive and positive environment, we have a few guidelines:

### General Contribution Guidelines

-   **No Self-Promotion**: Please focus on enhancing the project rather than promoting personal content or services.
-   **Adhere to WordPress Standards**: All contributions must comply with the [WordPress Coding Standards](https://developer.wordpress.org/coding-standards/wordpress-coding-standards/).

If you are unsure about anything, feel free to open an [issue](https://github.com/aegiswp/theme/issues) or a [pull request](https://github.com/aegiswp/theme/pulls) for guidance. Even if your contribution needs changes, we will kindly direct you to the appropriate resources or suggest modifications to your pull request.

We aim to foster a welcoming environment for everyone involved. Therefore, all contributors are expected to follow our [Code of Conduct](https://github.com/aegiswp/theme/blob/main/CODE_OF_CONDUCT.md).

### How to Contribute

1. **Fork the Repository**: Start by forking the [Aegis repository](https://github.com/aegiswp/theme/) to your GitHub account.
2. **Clone Your Fork**: Clone your fork to your local machine:

    ```bash
    git clone https://github.com/YOUR-USERNAME/aegis.git
    ```

3. **Create a New Branch**: Always create a new branch for your contributions:

    ```bash
    git checkout -b your-branch-name
    ```

4. **Make Your Changes**: Implement your changes, following WordPress coding standards.
5. **Run Tests and Linters**: Ensure your code passes all tests and adheres to coding standards:

    ```bash
    npm run lint
    composer run lint
    ```

6. **Commit and Push**: Commit your changes with a descriptive message and push them to your fork:

    ```bash
    git commit -m "Descriptive message of your changes"
    git push origin your-branch-name
    ```

7. **Submit a Pull Request**: Create a pull request (PR) to the `main` branch of the original repository.

### Contribution Best Practices

-   **Be Clear and Concise**: When creating issues or pull requests, provide as much context as possible.
-   **Stay Focused**: Keep your commits and pull requests focused on a single issue or feature.
-   **Write Meaningful Commit Messages**: Use descriptive commit messages that explain the "why" of the changes, not just the "what."

### Contributing Translations

Translations help make Aegis accessible to users worldwide. We welcome contributions in any language and appreciate your efforts to expand the theme's reach.

#### Getting Started

The theme's translation template file is located at [`languages/aegis.pot`](https://github.com/aegiswp/theme/blob/main/languages/aegis.pot). This file contains all translatable strings extracted from the theme and serves as the foundation for creating new translations.

#### Creating a New Translation

1. **Copy the POT file**: Create a copy of `aegis.pot` and rename it using the appropriate locale code:

    ```
    aegis-{locale}.po
    ```

    For example:
    - `aegis-es_ES.po` for Spanish (Spain)
    - `aegis-fr_FR.po` for French (France)
    - `aegis-de_DE.po` for German (Germany)
    - `aegis-pt_BR.po` for Portuguese (Brazil)

    Refer to the [WordPress Locale Codes](https://make.wordpress.org/polyglots/teams/) for the correct locale identifier.

2. **Use a PO Editor**: We recommend using one of the following tools:
    - [Poedit](https://poedit.net/) (Desktop application)
    - [Loco Translate](https://wordpress.org/plugins/loco-translate/) (WordPress plugin)
    - [GlotPress](https://glotpress.blog/) (Web-based)

3. **Update the PO file header**: Modify the header information in your `.po` file:

    ```
    "Language: es_ES\n"
    "Language-Team: Spanish <your-email@example.com>\n"
    "Last-Translator: Your Name <your-email@example.com>\n"
    "PO-Revision-Date: YYYY-MM-DD HH:MM+ZONE\n"
    ```

4. **Translate the strings**: Work through each `msgid` entry and provide the corresponding translation in `msgstr`.

5. **Generate the MO file**: Compile your `.po` file into a binary `.mo` file. Most PO editors do this automatically, or you can use:

    ```bash
    msgfmt aegis-es_ES.po -o aegis-es_ES.mo
    ```

#### Translation Best Practices

-   **Maintain Consistency**: Use consistent terminology throughout your translation. Refer to existing WordPress translations in your language for common terms.
-   **Preserve Placeholders**: Keep placeholders like `%s`, `%d`, and `%1$s` intact and in the correct order for your language.
-   **Respect HTML**: Do not translate HTML tags or attributes. Only translate the visible text content.
-   **Context Matters**: Pay attention to translator comments (lines starting with `#.`) that provide context for ambiguous strings.
-   **Test Your Translation**: Activate your translation in WordPress to verify it displays correctly in context.

#### Glossary

To maintain consistency across translations, please use the following terminology guidelines:

| English Term | Description |
|--------------|-------------|
| Block | A unit of content in the block editor (do not translate as "cube" or "brick") |
| Pattern | A pre-designed block layout |
| Template | A file that controls page structure |
| Template Part | A reusable section like header or footer |
| Site Editor | The full site editing interface |
| Global Styles | Site-wide styling settings |
| Theme | The overall design package |

For WordPress-specific terms, consult the [WordPress Polyglots Glossary](https://translate.wordpress.org/glossary/) for your language.

#### Submitting Your Translation

1. Place your `.po` and `.mo` files in the `languages/` directory.
2. Create a pull request with your translation files.
3. In your PR description, include:
    - The language and locale code
    - Your name for attribution in CONTRIBUTORS.md
    - Any notes about translation choices for ambiguous terms

#### Updating Existing Translations

If you are updating an existing translation:

1. Open the existing `.po` file in your PO editor.
2. Update the catalog from the latest `aegis.pot` file to capture new or changed strings.
3. Translate any new or fuzzy strings.
4. Update the `PO-Revision-Date` header.
5. Regenerate the `.mo` file.

### Licensing and Copyright

Aegis is licensed under the [GPL v3.0](https://github.com/aegiswp/theme/blob/main/LICENSE) license. By contributing to the Aegis theme, you agree that your contributions will be released under the GPL v3.0 license.

You retain copyright over any contribution made to Aegis. However, by submitting a [pull request](https://github.com/aegiswp/theme/pulls), you agree to release that contribution under the [GPL v3.0](https://github.com/aegiswp/theme/blob/main/LICENSE) license.

### Final Notes

We value and appreciate all contributions and strive to create a positive and welcoming environment. If you have any questions or need further guidance, please feel free to reach out via an issue or discussion thread.

Thank you for contributing to Aegis and helping us build a better theme!