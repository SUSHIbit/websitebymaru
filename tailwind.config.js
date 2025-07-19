import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Inter', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                // Enhanced slate palette for professional look
                slate: {
                    50: '#f8fafc',
                    100: '#f1f5f9',
                    200: '#e2e8f0',
                    300: '#cbd5e1',
                    400: '#94a3b8',
                    500: '#64748b',
                    600: '#475569',
                    700: '#334155',
                    800: '#1e293b',
                    900: '#0f172a',
                    950: '#020617',
                }
            },
            backgroundImage: {
                'gradient-radial': 'radial-gradient(var(--tw-gradient-stops))',
                'gradient-conic': 'conic-gradient(from 180deg at 50% 50%, var(--tw-gradient-stops))',
            },
            animation: {
                'fade-in': 'fadeIn 0.5s ease-in-out',
                'slide-up': 'slideUp 0.5s ease-out',
                'bounce-slow': 'bounce 2s infinite',
            },
            keyframes: {
                fadeIn: {
                    '0%': { opacity: '0' },
                    '100%': { opacity: '1' },
                },
                slideUp: {
                    '0%': { transform: 'translateY(20px)', opacity: '0' },
                    '100%': { transform: 'translateY(0)', opacity: '1' },
                }
            },
            typography: {
                slate: {
                    css: {
                        '--tw-prose-body': '#334155',
                        '--tw-prose-headings': '#0f172a',
                        '--tw-prose-lead': '#475569',
                        '--tw-prose-links': '#0f172a',
                        '--tw-prose-bold': '#0f172a',
                        '--tw-prose-counters': '#64748b',
                        '--tw-prose-bullets': '#cbd5e1',
                        '--tw-prose-hr': '#e2e8f0',
                        '--tw-prose-quotes': '#0f172a',
                        '--tw-prose-quote-borders': '#e2e8f0',
                        '--tw-prose-captions': '#64748b',
                        '--tw-prose-code': '#0f172a',
                        '--tw-prose-pre-code': '#e2e8f0',
                        '--tw-prose-pre-bg': '#1e293b',
                        '--tw-prose-th-borders': '#cbd5e1',
                        '--tw-prose-td-borders': '#e2e8f0',
                    },
                },
            },
        },
    },

    plugins: [
        forms,
        typography,
        // Custom plugin for additional utilities
        function({ addUtilities }) {
            const newUtilities = {
                '.backdrop-blur-xs': {
                    'backdrop-filter': 'blur(2px)',
                },
                '.text-shadow': {
                    'text-shadow': '0 1px 2px rgba(0, 0, 0, 0.1)',
                },
                '.text-shadow-md': {
                    'text-shadow': '0 2px 4px rgba(0, 0, 0, 0.15)',
                },
                '.text-shadow-lg': {
                    'text-shadow': '0 4px 8px rgba(0, 0, 0, 0.2)',
                },
            }
            addUtilities(newUtilities)
        }
    ],
};