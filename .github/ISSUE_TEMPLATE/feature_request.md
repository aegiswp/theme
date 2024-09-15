name: Feature Request
description: Suggest a new feature or enhancement for the Aegis WordPress Block Theme, including detailed specifications and use cases.
labels: ['[Type] Feature', '[Type] Enhancement', 'triage']
assignees: atmostfear-entertainment
body:
  - type: markdown
    attributes:
      value: |
        Thank you for suggesting a new feature or enhancement! Your input helps us continuously improve the Aegis WordPress Block Theme. Please provide as much detail as possible to help us evaluate and implement your request effectively.

  - type: textarea
    attributes:
      label: Problem Statement
      description: Please describe the problem you are facing or the opportunity you see. What frustrates you, or what is currently missing?
      placeholder: |
        Example: I am always frustrated when [...]
    validations:
      required: true

  - type: textarea
    attributes:
      label: Desired Solution
      description: Provide a clear and concise description of the feature or enhancement you would like to see.
      placeholder: |
        Example: I would like to see [...]
    validations:
      required: true

  - type: textarea
    attributes:
      label: Alternative Solutions
      description: Describe any alternative solutions or features you have considered and explain why they are not ideal.
      placeholder: |
        Example: I have also considered [...], but [...]
    validations:
      required: false

  - type: textarea
    attributes:
      label: Feature Overview
      description: Provide a high-level overview of the proposed feature, detailing
