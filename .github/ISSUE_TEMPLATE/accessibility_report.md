name: Accessibility Report
description: Report an accessibility issue related to the Aegis WordPress Block Theme.
labels: ['[Type] Accessibility', 'triage']
assignees: atmostfear-entertainment
body:
  - type: markdown
    attributes:
      value: |
        Thank you for reporting an accessibility issue! Your feedback helps us ensure the Aegis WordPress Block Theme is usable and inclusive for everyone. Please provide as much detail as possible to help us understand and resolve the issue.

  - type: textarea
    attributes:
      label: Issue Description
      description: Provide a detailed description of the accessibility issue. Include what you expected to happen and what actually happened.
      placeholder: |
        Example: When navigating with a screen reader, the '...' element is not announced as expected.
    validations:
      required: true

  - type: textarea
    attributes:
      label: Affected Elements
      description: List any specific elements, components, or blocks where the accessibility issue occurs.
      placeholder: |
        Example: Navigation menu, search input field, or specific block (e.g., "Cover Block").
    validations:
      required: true

  - type: textarea
    attributes:
      label: Steps to Reproduce
      description: Provide the steps needed to reproduce the accessibility issue.
      placeholder: |
        1. Go to '...'
        2. Use '...' assistive technology (e.g., screen reader, keyboard-only navigation)
        3. Observe the '...' behavior
    validations:
      required: true

  - type: textarea
    attributes:
      label: Accessibility Standards Affected
      description: Specify which accessibility standards or guidelines are not being met (e.g., WCAG 2.1, ARIA roles, keyboard navigation).
      placeholder: |
        Example: WCAG 2.1 AA - 1.3.1 Info and Relationships
    validations:
      required: false

  - type: textarea
    attributes:
      label: Screenshots or Videos
      description: Provide screenshots, screen recordings, or videos demonstrating the accessibility issue.
    validations:
      required: false

  - type: textarea
    attributes:
      label: Environment Information
      description: Provide details about your environment, including the assistive technology used (e.g., screen reader, keyboard-only navigation), browser version, and operating system.
      placeholder: |
        Assistive technology: 
        Browser: 
        Operating System:
    validations:
      required: true

  - type: textarea
    attributes:
      label: Proposed Solution or Suggestion
      description: Provide any suggestions or solutions you have in mind to resolve this accessibility issue.
      placeholder: |
        Example: Use ARIA roles to provide better context for screen readers.
    validations:
      required: false

  - type: checkboxes
    id: search
    attributes:
      label: Confirm You Have Searched for Existing Accessibility Issues
      description: Please confirm that you have searched for existing accessibility issues to avoid duplicates.
      options:
        - label: 'Yes, I have searched for existing accessibility issues.'
          required: true
