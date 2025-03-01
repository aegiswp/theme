import React from 'react';
import { createRoot } from 'react-dom/client';
import Header from './components/Header';

// Wait for DOM to be ready
document.addEventListener('DOMContentLoaded', () => {
    const container = document.getElementById('aegis-header');
    if (container) {
        const root = createRoot(container);
        root.render(React.createElement(Header));
    }
});
