const defaults = require('tailwindcss/defaultTheme');

module.exports = {
    darkMode: 'class',
    content: require('fast-glob').sync([
        'source/**/*.html',
        'source/**/*.md',
        'source/**/*.js',
        'source/**/*.php',
        'source/**/*.vue',
    ]),
    options: {
        safelist: [/language/, /hljs/, /mce/],
    },
    theme: {
        extend: {
            fontFamily: {
                sans: ['Syne', ...defaults.fontFamily.sans],
                serif: ['"Source Serif 4"', ...defaults.fontFamily.serif],
                mono: ['"JetBrains Mono"', ...defaults.fontFamily.mono],
            },
            lineHeight: {
                normal: '1.6',
                loose: '1.75',
            },
            maxWidth: {
                '8xl': '88rem',
            },
            boxShadow: {
                search: '0 -1px 27px 0 rgba(0, 0, 0, 0.04), 0 4px 15px 0 rgba(0, 0, 0, 0.08)',
            },
            typography: (theme) => ({
                DEFAULT: {
                    css: {
                        '--tw-prose-body': theme('colors.gray[700]'),
                        '--tw-prose-headings': theme('colors.gray[900]'),
                        '--tw-prose-links': theme('colors.cyan[600]'),
                        '--tw-prose-code': theme('colors.gray[900]'),
                        '--tw-prose-pre-bg': theme('colors.gray[950]'),
                        '--tw-prose-invert-body': theme('colors.gray[300]'),
                        '--tw-prose-invert-headings': theme('colors.gray[50]'),
                        '--tw-prose-invert-links': theme('colors.cyan[400]'),
                        '--tw-prose-invert-code': theme('colors.gray[100]'),
                        '--tw-prose-invert-pre-bg': 'rgb(0 0 0)',
                    },
                },
            }),
        },
        fontSize: {
            xs: '.8rem',
            sm: '.925rem',
            base: '1rem',
            lg: '1.125rem',
            xl: '1.25rem',
            '2xl': '1.5rem',
            '3xl': '1.75rem',
            '4xl': '2.125rem',
            '5xl': '2.625rem',
            '6xl': '10rem',
        },
    },
    plugins: [
        require('@tailwindcss/typography'),
    ],
};
