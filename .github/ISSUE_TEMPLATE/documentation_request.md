name: Documentation Request
description: Request updates or improvements to the documentation for the Aegis WordPress Block Theme.
labels: ['[Type] Documentation', 'triage']
assignees: atmostfear-entertainment
body:
  - type: markdown
    attributes:
      value: |
        Thank you for helping us improve the documentation for the Aegis WordPress Block Theme! Please provide specific details about the documentation you believe needs updating or enhancement.

  - type: textarea
    attributes:
      label: Documentation Area
      description: Specify which area of the Aegis block theme documentation needs improvement (e.g., theme setup, block usage, customization, advanced configurations).
      placeholder: |
        Example: "Block Patterns - Creating Custom Patterns" or "Theme Setup - Installation Instructions"
    validations:
      required: true

  - type: textarea
    attributes:
      label: Problem or Improvement Description
      description: Describe the problem with the existing documentation or the improvement you suggest.
      placeholder: |
        Example: "The documentation for creating custom block patterns lacks details about registering patterns in the `theme.json` file."
    validations:
      required: true

  - type: textarea
    attributes:
      label: Suggested Changes or Additions
      description: Provide a clear and concise description of the changes or additions you would like to see in the block theme documentation.
      placeholder: |
        Example: "Include a section that explains how to register custom block patterns with examples for different block types."
    validations:
      required: false

  - type: textarea
    attributes:
      label: Target Audience
      description: Specify the target audience for the requested documentation update (e.g., developers, designers, content editors).
      placeholder: |
        Example: "This documentation update would be helpful for theme developers."
    validations:
      required: false

  - type: textarea
    attributes:
      label: Additional Context
      description: Provide any additional context, examples, or references to help us understand your request better.
      placeholder: |
        Example: "Refer to the WordPress block editor handbook for more details on block pattern registration."
    validations:
      required: false

  - type: textarea
    attributes:
      label: Screenshots or Mockups
      description: Provide any screenshots, sketches, or mockups to illustrate the documentation improvement request.
    validations:
      required: false

  - type: checkboxes
    id: search
    attributes:
      label: Confirm You Have Checked Existing Documentation
      description: Confirm that you have checked the existing documentation to ensure this is a new request.
      options:
        - label: 'Yes, I have checked the existing documentation.'
          required: true
