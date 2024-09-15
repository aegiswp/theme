name: Support Request
description: Ask a question or request support related to the Aegis WordPress Block Theme.
labels: ['[Type] Question', 'triage']
assignees: atmostfear-entertainment
body:
  - type: markdown
    attributes:
      value: |
        Have a question or need support? Please provide as much detail as possible to help us understand your inquiry.

  - type: textarea
    attributes:
      label: Question or Issue Description
      description: Describe your question or the issue you need help with.
      placeholder: Please provide a clear and concise description of your question or support request.
    validations:
      required: true

  - type: textarea
    attributes:
      label: Relevant Context or Details
      description: Provide any relevant context or details that may help us understand your question or issue.
      placeholder: Context, details, screenshots, or links that may help.
    validations:
      required: false

  - type: textarea
    attributes:
      label: Environment Information
      description: Please provide details about your development environment (e.g., WordPress version, theme version, browser, device).
      placeholder: |
        WordPress version:
        Aegis theme version:
        Browser:
        Device:
        Operating System:
    validations:
      required: false

  - type: checkboxes
    id: search
    attributes:
      label: Confirm You Have Searched for Existing Answers
      description: Please confirm that you have searched for existing questions or answers related to your issue.
      options:
        - label: 'Yes, I have searched for existing answers.'
          required: true
