name: Bug Report
description: Report a bug with the Aegis WordPress Block Theme.
labels: ['[Type] Bug', 'triage']
assignees: atmostfear-entertainment
body:

-   type: markdown
    attributes:
    value: |
    Thank you for taking the time to report a bug! Your feedback helps us improve the Aegis WordPress Block Theme. If this is a security issue, please contact us directly.

-   type: textarea
    attributes:
    label: Description
    description: Please provide a detailed description of the bug, including what you expected to happen and what is currently happening.
    placeholder: |
    Feature '...' is not working properly. I expect '...' to happen, but '...' happens instead.
    validations:
    required: true

-   type: textarea
    attributes:
    label: Step-by-step reproduction instructions
    description: Please provide the steps needed to reproduce the bug.
    placeholder: | 1. Go to '...' 2. Click on '...' 3. Scroll down to '...' 4. See error
    validations:
    required: true

-   type: textarea
    attributes:
    label: Screenshots, screen recordings, or code snippets
    description: |
    If possible, please attach screenshots, screen recordings, or code snippets that demonstrate the bug. This helps us reproduce the issue more efficiently. You can use tools like LICEcap to create a GIF screen recording: [LICEcap](https://www.cockos.com/licecap/). - To attach images or files, drag them into this area. - If the issue involves a specific code snippet, please provide it here or use GitHub Gist: [GitHub Gist](https://gist.github.com).
    validations:
    required: false

-   type: textarea
    attributes:
    label: Environment Information
    description: |
    Please provide details about your development environment: - WordPress version, Aegis theme version, and any active plugins. - Browser(s) where you see the problem. - Device and operating system (e.g., "Desktop with Windows 10", "iPhone with iOS 14").
    placeholder: |
    WordPress version:
    Aegis Theme version:
    Browser:
    Device:
    Operating System:
    validations:
    required: true

-   type: checkboxes
    id: existing-issues
    attributes:
    label: Confirm you have searched for existing issues.
    description: Please ensure the bug has not been reported already by searching [existing issues](https://github.com/aegiswp/theme/issues).
    options: - label: 'Yes, I have searched for existing issues.'
    required: true

-   type: checkboxes
    id: plugin-compatibility
    attributes:
    label: Confirm you have tested with plugins deactivated.
    description: To confirm the bug is specific to the Aegis theme, deactivate all plugins and test again.
    options: - label: 'Yes, I have tested with all plugins deactivated.'
    required: true

-   type: textarea
    attributes:
    label: Additional Context
    description: Add any other context about the problem here, including error messages, logs, or related issues.
    placeholder: Provide any additional information that may help us understand and fix the issue.
    validations:
    required: false
