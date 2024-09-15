name: Pull Request
description: Submit a pull request to propose changes or improvements to the Aegis WordPress Block Theme.
labels: ['[Type] Enhancement', 'triage']
assignees: atmostfear-entertainment
body:
  - type: markdown
    attributes:
      value: |
        Thank you for contributing to the Aegis WordPress Block Theme! Please ensure your pull request adheres to our guidelines.

  - type: textarea
    attributes:
      label: Description of Changes
      description: Provide a brief description of the changes proposed in this pull request.
      placeholder: Describe the changes you made and why they are necessary.
    validations:
      required: true

  - type: textarea
    attributes:
      label: Related Issues
      description: Reference any related issues with keywords (e.g., "Fixes #123").
      placeholder: List related issues, e.g., "Fixes #123".
    validations:
      required: false

  - type: checkboxes
    id: changes-made
    attributes:
      label: Changes Made
      description: List the changes made in this pull request.
      options:
        - label: 'Feature 1: Brief description'
        - label: 'Feature 2: Brief description'
        - label: 'Bug fix 1: Brief description'
          required: true

  - type: textarea
    attributes:
      label: Testing Instructions
      description: Provide instructions on how to test the changes.
      placeholder: |
        Describe how you have tested the changes. Include details for both manual testing and any automated tests.

        1. Step 1: [...]
        2. Step 2: [...]
    validations:
      required: true

  - type: textarea
    attributes:
      label: Screenshots
      description: If applicable, provide screenshots or video demonstrating the changes.
      validations:
      required: false

  - type: textarea
    attributes:
      label: Additional Context
      description: Add any additional context or considerations for this pull request.
      placeholder: Provide any additional information or context here.
    validations:
      required: false
