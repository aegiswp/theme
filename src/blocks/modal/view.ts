/**
 * Modal Block - Frontend Script
 *
 * Accessible, performant modal functionality with focus trap,
 * keyboard navigation, and screen reader support.
 *
 * @package Aegis
 * @since   1.0.0
 */

interface ModalConfig {
	modalId: string;
	modalType: string;
	triggerType: string;
	animation: string;
	closeOnEsc: boolean;
	closeOnOverlay: boolean;
	preventScroll: boolean;
	focusTrap: boolean;
	returnFocus: boolean;
	scrollTriggerPercent: number;
	scrollTriggerOnce: boolean;
	exitIntentSensitivity: number;
	exitIntentDelay: number;
	timedTriggerDelay: number;
	autoCloseDelay: number;
	showOnce: boolean;
	showOnceExpiry: number;
	deviceVisibility: string[];
}

interface ModalInstance {
	wrapper: HTMLElement;
	trigger: HTMLButtonElement | null;
	modal: HTMLElement;
	config: ModalConfig;
	previousActiveElement: HTMLElement | null;
	focusableElements: HTMLElement[];
	isOpen: boolean;
	hasTriggered: boolean;
	autoCloseTimer: number | null;
}

class AegisModal {
	private modals: Map<string, ModalInstance> = new Map();
	private openModals: string[] = [];
	private scrollHandler: (() => void) | null = null;
	private exitIntentHandler: ((e: MouseEvent) => void) | null = null;

	constructor() {
		this.init();
	}

	private init(): void {
		// Use requestIdleCallback for non-critical initialization
		if ('requestIdleCallback' in window) {
			requestIdleCallback(() => this.setupModals());
		} else {
			// Fallback for Safari
			setTimeout(() => this.setupModals(), 1);
		}

		// Global keyboard listener (delegated)
		document.addEventListener('keydown', this.handleKeydown.bind(this));
	}

	/**
	 * Get current device type based on viewport width.
	 */
	private getDeviceType(): string {
		const width = window.innerWidth;
		if (width < 768) return 'mobile';
		if (width < 1024) return 'tablet';
		return 'desktop';
	}

	/**
	 * Check if modal should be visible on current device.
	 */
	private isVisibleOnDevice(config: ModalConfig): boolean {
		const device = this.getDeviceType();
		return config.deviceVisibility.includes(device);
	}

	/**
	 * Check if modal has been shown before (localStorage).
	 */
	private hasBeenShown(modalId: string, expiryDays: number): boolean {
		const key = `aegis-modal-shown-${modalId}`;
		const stored = localStorage.getItem(key);
		if (!stored) return false;

		const timestamp = parseInt(stored, 10);
		const expiryMs = expiryDays * 24 * 60 * 60 * 1000;
		return Date.now() - timestamp < expiryMs;
	}

	/**
	 * Mark modal as shown in localStorage.
	 */
	private markAsShown(modalId: string): void {
		const key = `aegis-modal-shown-${modalId}`;
		localStorage.setItem(key, Date.now().toString());
	}

	private setupModals(): void {
		const wrappers = document.querySelectorAll<HTMLElement>('.aegis-modal-wrapper');

		wrappers.forEach((wrapper) => {
			const config = this.getConfig(wrapper);
			if (!config.modalId) return;

			// Check device visibility
			if (!this.isVisibleOnDevice(config)) return;

			// Check show-once setting
			if (config.showOnce && this.hasBeenShown(config.modalId, config.showOnceExpiry)) return;

			const trigger = wrapper.querySelector<HTMLButtonElement>('.aegis-modal-trigger');
			const modal = wrapper.querySelector<HTMLElement>('.aegis-modal');

			if (!modal) return;

			const instance: ModalInstance = {
				wrapper,
				trigger,
				modal,
				config,
				previousActiveElement: null,
				focusableElements: [],
				isOpen: false,
				hasTriggered: false,
				autoCloseTimer: null,
			};

			this.modals.set(config.modalId, instance);

			// Setup trigger based on type
			this.setupTrigger(instance);

			// Close button(s)
			modal.querySelectorAll<HTMLButtonElement>('[data-close-modal]').forEach((btn) => {
				btn.addEventListener('click', () => this.close(config.modalId));
			});

			// Overlay click (if enabled)
			if (config.closeOnOverlay) {
				const overlay = modal.querySelector<HTMLElement>('.aegis-modal__overlay');
				overlay?.addEventListener('click', () => this.close(config.modalId));
			}
		});

		// Setup global scroll listener for scroll-triggered modals
		this.setupScrollTrigger();

		// Setup exit intent listener
		this.setupExitIntentTrigger();
	}

	/**
	 * Setup trigger based on trigger type.
	 */
	private setupTrigger(instance: ModalInstance): void {
		const { trigger, config } = instance;

		switch (config.triggerType) {
			case 'button':
			case 'icon':
			case 'text':
			case 'image':
				// Click-based triggers
				if (trigger) {
					trigger.addEventListener('click', () => this.open(config.modalId));
				}
				break;

			case 'scroll':
				// Handled by global scroll listener
				break;

			case 'exit-intent':
				// Handled by global exit intent listener
				break;

			case 'timed':
				// Auto-open after delay
				if (config.timedTriggerDelay > 0) {
					setTimeout(() => {
						if (!instance.hasTriggered) {
							this.open(config.modalId);
						}
					}, config.timedTriggerDelay);
				}
				break;
		}
	}

	/**
	 * Setup scroll-based trigger for modals.
	 */
	private setupScrollTrigger(): void {
		const scrollModals = Array.from(this.modals.values()).filter(
			(instance) => instance.config.triggerType === 'scroll'
		);

		if (scrollModals.length === 0) return;

		this.scrollHandler = () => {
			const scrollPercent = (window.scrollY / (document.documentElement.scrollHeight - window.innerHeight)) * 100;

			scrollModals.forEach((instance) => {
				const { config } = instance;
				if (instance.hasTriggered && config.scrollTriggerOnce) return;
				if (instance.isOpen) return;

				if (scrollPercent >= config.scrollTriggerPercent) {
					this.open(config.modalId);
				}
			});
		};

		// Use passive listener for performance
		window.addEventListener('scroll', this.scrollHandler, { passive: true });
	}

	/**
	 * Setup exit intent trigger (mouse leaving viewport at top).
	 */
	private setupExitIntentTrigger(): void {
		const exitIntentModals = Array.from(this.modals.values()).filter(
			(instance) => instance.config.triggerType === 'exit-intent'
		);

		if (exitIntentModals.length === 0) return;

		this.exitIntentHandler = (e: MouseEvent) => {
			// Only trigger when mouse leaves from top of viewport
			if (e.clientY > 0) return;

			exitIntentModals.forEach((instance) => {
				const { config } = instance;
				if (instance.hasTriggered) return;
				if (instance.isOpen) return;

				// Check sensitivity (how far above viewport)
				if (e.clientY <= -config.exitIntentSensitivity) {
					if (config.exitIntentDelay > 0) {
						setTimeout(() => {
							if (!instance.hasTriggered && !instance.isOpen) {
								this.open(config.modalId);
							}
						}, config.exitIntentDelay);
					} else {
						this.open(config.modalId);
					}
				}
			});
		};

		document.addEventListener('mouseleave', this.exitIntentHandler);
	}

	private getConfig(wrapper: HTMLElement): ModalConfig {
		return {
			modalId: wrapper.dataset.modalId || '',
			modalType: wrapper.dataset.modalType || 'popup',
			triggerType: wrapper.dataset.triggerType || 'button',
			animation: wrapper.dataset.animation || 'fade',
			closeOnEsc: wrapper.dataset.closeEsc !== 'false',
			closeOnOverlay: wrapper.dataset.closeOverlay !== 'false',
			preventScroll: wrapper.dataset.preventScroll !== 'false',
			focusTrap: wrapper.dataset.focusTrap !== 'false',
			returnFocus: wrapper.dataset.returnFocus !== 'false',
			scrollTriggerPercent: parseInt(wrapper.dataset.scrollTriggerPercent || '50', 10),
			scrollTriggerOnce: wrapper.dataset.scrollTriggerOnce !== 'false',
			exitIntentSensitivity: parseInt(wrapper.dataset.exitIntentSensitivity || '20', 10),
			exitIntentDelay: parseInt(wrapper.dataset.exitIntentDelay || '0', 10),
			timedTriggerDelay: parseInt(wrapper.dataset.timedTriggerDelay || '5000', 10),
			autoCloseDelay: parseInt(wrapper.dataset.autoCloseDelay || '0', 10),
			showOnce: wrapper.dataset.showOnce === 'true',
			showOnceExpiry: parseInt(wrapper.dataset.showOnceExpiry || '7', 10),
			deviceVisibility: (wrapper.dataset.deviceVisibility || 'desktop,tablet,mobile').split(','),
		};
	}

	public open(modalId: string): void {
		const instance = this.modals.get(modalId);
		if (!instance || instance.isOpen) return;

		const { modal, trigger, config } = instance;

		// Mark as triggered for show-once and scroll-once
		instance.hasTriggered = true;

		// Mark as shown in localStorage if show-once is enabled
		if (config.showOnce) {
			this.markAsShown(modalId);
		}

		// Store the element that had focus before opening
		instance.previousActiveElement = document.activeElement as HTMLElement;

		// Update ARIA states
		if (trigger) {
			trigger.setAttribute('aria-expanded', 'true');
		}
		modal.setAttribute('aria-hidden', 'false');
		modal.removeAttribute('hidden');

		// Add open class for CSS animations
		modal.classList.add('aegis-modal--opening');

		// Prevent body scroll
		if (config.preventScroll) {
			document.body.style.overflow = 'hidden';
			document.body.setAttribute('data-modal-open', 'true');
		}

		// Wait for animation frame to ensure DOM is updated
		requestAnimationFrame(() => {
			modal.classList.remove('aegis-modal--opening');
			modal.classList.add('aegis-modal--open');

			// Get focusable elements for focus trap
			if (config.focusTrap) {
				instance.focusableElements = this.getFocusableElements(modal);
			}

			// Focus the modal or first focusable element
			this.setInitialFocus(instance);
		});

		instance.isOpen = true;
		this.openModals.push(modalId);

		// Setup auto-close timer if configured
		if (config.autoCloseDelay > 0) {
			instance.autoCloseTimer = window.setTimeout(() => {
				this.close(modalId);
			}, config.autoCloseDelay);
		}

		// Announce to screen readers
		this.announceToScreenReader('Dialog opened');
	}

	public close(modalId: string): void {
		const instance = this.modals.get(modalId);
		if (!instance || !instance.isOpen) return;

		const { modal, trigger, config } = instance;

		// Clear auto-close timer if exists
		if (instance.autoCloseTimer) {
			clearTimeout(instance.autoCloseTimer);
			instance.autoCloseTimer = null;
		}

		// Add closing class for CSS animations
		modal.classList.remove('aegis-modal--open');
		modal.classList.add('aegis-modal--closing');

		// Wait for animation to complete
		const duration = parseInt(
			getComputedStyle(modal).getPropertyValue('--aegis-modal-duration') || '200',
			10
		);

		setTimeout(() => {
			modal.classList.remove('aegis-modal--closing');
			modal.setAttribute('aria-hidden', 'true');
			modal.setAttribute('hidden', '');
			if (trigger) {
				trigger.setAttribute('aria-expanded', 'false');
			}

			// Restore body scroll
			if (config.preventScroll) {
				document.body.style.overflow = '';
				document.body.removeAttribute('data-modal-open');
			}

			// Return focus to trigger element (only for click-based triggers)
			if (config.returnFocus && instance.previousActiveElement && trigger) {
				instance.previousActiveElement.focus();
			}

			instance.isOpen = false;
			this.openModals = this.openModals.filter((id) => id !== modalId);

			// Announce to screen readers
			this.announceToScreenReader('Dialog closed');
		}, duration);
	}

	private handleKeydown(event: KeyboardEvent): void {
		// Only handle if a modal is open
		if (this.openModals.length === 0) return;

		const currentModalId = this.openModals[this.openModals.length - 1];
		const instance = this.modals.get(currentModalId);
		if (!instance) return;

		const { config } = instance;

		switch (event.key) {
			case 'Escape':
				if (config.closeOnEsc) {
					event.preventDefault();
					this.close(currentModalId);
				}
				break;

			case 'Tab':
				if (config.focusTrap) {
					this.handleTabKey(event, instance);
				}
				break;
		}
	}

	private handleTabKey(event: KeyboardEvent, instance: ModalInstance): void {
		const { focusableElements } = instance;
		if (focusableElements.length === 0) return;

		const firstElement = focusableElements[0];
		const lastElement = focusableElements[focusableElements.length - 1];
		const activeElement = document.activeElement;

		if (event.shiftKey) {
			// Shift + Tab: going backwards
			if (activeElement === firstElement) {
				event.preventDefault();
				lastElement.focus();
			}
		} else {
			// Tab: going forwards
			if (activeElement === lastElement) {
				event.preventDefault();
				firstElement.focus();
			}
		}
	}

	private getFocusableElements(container: HTMLElement): HTMLElement[] {
		const selector = [
			'a[href]',
			'button:not([disabled])',
			'input:not([disabled]):not([type="hidden"])',
			'select:not([disabled])',
			'textarea:not([disabled])',
			'[tabindex]:not([tabindex="-1"])',
			'[contenteditable="true"]',
		].join(', ');

		const elements = Array.from(container.querySelectorAll<HTMLElement>(selector));

		// Filter out elements that are not visible
		return elements.filter((el) => {
			return el.offsetParent !== null && getComputedStyle(el).visibility !== 'hidden';
		});
	}

	private setInitialFocus(instance: ModalInstance): void {
		const { modal, focusableElements } = instance;

		// Try to focus the close button first, then first focusable, then modal itself
		const closeButton = modal.querySelector<HTMLButtonElement>('.aegis-modal__close');
		if (closeButton) {
			closeButton.focus();
			return;
		}

		if (focusableElements.length > 0) {
			focusableElements[0].focus();
			return;
		}

		// Fallback: focus the modal container
		modal.focus();
	}

	private announceToScreenReader(message: string): void {
		// Create or reuse live region
		let liveRegion = document.getElementById('aegis-modal-announcer');

		if (!liveRegion) {
			liveRegion = document.createElement('div');
			liveRegion.id = 'aegis-modal-announcer';
			liveRegion.setAttribute('role', 'status');
			liveRegion.setAttribute('aria-live', 'polite');
			liveRegion.setAttribute('aria-atomic', 'true');
			liveRegion.className = 'screen-reader-text';
			document.body.appendChild(liveRegion);
		}

		// Clear and set message
		liveRegion.textContent = '';
		requestAnimationFrame(() => {
			liveRegion!.textContent = message;
		});
	}

	// Public API for programmatic control
	public getModal(modalId: string): ModalInstance | undefined {
		return this.modals.get(modalId);
	}

	public isModalOpen(modalId: string): boolean {
		return this.modals.get(modalId)?.isOpen || false;
	}
}

// Initialize when DOM is ready
if (document.readyState === 'loading') {
	document.addEventListener('DOMContentLoaded', () => {
		(window as any).aegisModal = new AegisModal();
	});
} else {
	(window as any).aegisModal = new AegisModal();
}

// Respect reduced motion preference
if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
	document.documentElement.style.setProperty('--aegis-modal-duration', '0ms');
}
