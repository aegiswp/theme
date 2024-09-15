name: Custom Issue
description: Report an issue that does not fit into other predefined categories for the Aegis WordPress Block Theme.
labels: ['[Type] Other', 'triage']
assignees: atmostfear-entertainment
body:
  - type: markdown
    attributes:
      value: |
        Thank you for reporting an issue! If your issue does not fit into any other category, please provide as much detail as possible.

  - type: textarea
    attributes:
      label: Issue Description
      description: Describe the issue you are facing.
      placeholder: Provide a clear and concise description of the issue.
    validations:
      required: true

  - type: textarea
    attributes:
      label: Steps to Reproduce
      description: Provide the steps needed to reproduce the issue.
      placeholder: Example: 1. Go to '...', 2. Click on '...', 3. Scroll down to '...'
    validations:
      required: false

  - type: textarea
    attributes:
      label: Expected Behavior
      description: Describe what you expected to happen.
      placeholder: Provide a clear description of the expected outcome.
    validations:
      required: false

  - type: textarea
    attributes:
      label: Actual Behavior
      description: Describe what actually happened.
      placeholder: Provide a clear description of the actual outcome.
    validations:
      required: false

  - type: textarea
    attributes:
      label: Additional Information
      description: Provide any additional information, context, or screenshots that may help us understand the issue.
      placeholder: Include logs, screenshots, or any other relevant details.
    validations:
      required: false
