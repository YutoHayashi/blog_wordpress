module.exports = {
    content: [
        './*.php',
        './parts/**/*.php',
    ],
    theme: {
        fontFamily: {
            ui: [ 'Segoe UI', 'meiryo', 'yu gothic', 'hiragino kaku gothic pron', 'sans-serif', 'mdi' ],
        },
        extend: {
            fontSize: Object.assign( {
                base: '62.5%',
            }, ...Array.from( Array( 40 ) ).map( ( _, i ) => ( { [ i ]: `${ ( i * .1 ).toPrecision( 2 ) }rem` } ) ), ),
            colors: {
                transparent: 'transparent',
                primary: '#F43E71',
                secondary: '#3D3D3B',
                youtube: '#FF2905',
                twitter: '#1C9BF0',
            },
            screens: {
                '3xl': '2528px',
            },
            maxWidth: {
                'inner': '1280px',
                'second-inner': '660px',
            },
            height: {
                banner: '190px',
            },
            maxHeight: {
                'card-s': '240px',
            },
            colors: {
                transparent: 'transparent',
                primary: '#F43E71',
                secondary: '#3D3D3B',
                youtube: '#FF2905',
                twitter: '#1C9BF0',
            },
        },
    },
    variants: {
        extend: {  },
    },
    plugins: [
        require( '@tailwindcss/forms' ),
    ],
}
