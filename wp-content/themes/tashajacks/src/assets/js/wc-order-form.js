class OrderForm extends HTMLElement {
	connectedCallback() {
		this.activeForm = null;
		this.localStorageName = this.getAttribute('local-storage-name') || 'tjOrderForm';

		this.loadActiveForm();
		this.setFormIDInputValue();
	}

	loadActiveForm() {
		if (localStorage.getItem(this.localStorageName) !== null) {
			this.activeForm = localStorage.getItem(this.localStorageName);
			return;
		}

		this.activeForm = this.generateFormID();
	}

	saveActiveForm() {}

	/**
	 * Set Form ID Input Value
	 *
	 * @returns
	 */
	setFormIDInputValue() {
		let input = this.querySelector('form input[name="form-id"]');

		if (!input) {
			let input = document.createElement('input');
			input.name = 'form-id';
			input.type = 'hidden';
			this.querySelector('form').appendChild(input);
		}

		input.value = this.activeForm;
	}

	/**
	 * Generate Form ID
	 * Generates a random UUID for the currently active form
	 * @returns string
	 */
	generateFormID() {
		// Use browser library if it exists
		if (window.crypto.randomUUID instanceof Function) {
			return window.crypto.randomUUID();
		}

		return ([1e7] + -1e3 + -4e3 + -8e3 + -1e11).replace(/[018]/g, (c) => (c ^ (crypto.getRandomValues(new Uint8Array(1))[0] & (15 >> (c / 4)))).toString(16));
	}
}

window.customElements.define('tj-order-form', OrderForm);
