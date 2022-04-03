module.exports = {
    content: [
        './*.php',
        './parts/**/*.php',
    ],
    safelist: [
        'h-0',
    ],
    theme: {
        fontFamily: {
            ui: [ 'Arial', 'Helvetica', 'sans-serif' ],
            roboto: [ 'Roboto Slab', 'Roboto Mono', 'monospace', 'Arial', 'Helvetica', 'sans-serif' ],
        },
        extend: {
            fontSize: Object.assign( {
                base: '62.5%',
            }, ...Array.from( Array( 50 ) ).map( ( _, i ) => ( { [ i ]: `${ ( i * .1 ).toPrecision( 2 ) }rem` } ) ), ),
            maxWidth: {
                inner: '1300px',
            },
            maxHeight: {
                'card-img': '270px',
            },
            minHeight: {
                'card-img': '270px',
            },
            colors: {
                white: '#FCFCFC',
                primary: '#03318C',
                youtube: '#FF2905',
                twitter: '#1C9BF0',
            },
            zIndex: {
                'm10': -10,
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
