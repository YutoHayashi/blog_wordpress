const expandables = document.querySelectorAll( '.expandable' );

const expandable_active = ( expandable: Element ) => {
    expandable.classList.add( 'active' );
    expandable.querySelector( 'ul' )?.classList.add( 'active' );
    expandable.querySelector( '.mdi.mdi-chevron-down' )?.classList.add( 'mdi-rotate-180' );
};

const expandable_deactive = ( expandable: Element ) => {
    expandable.classList.remove( 'active' );
    expandable.querySelector( 'ul' )?.classList.remove( 'active' );
    expandable.querySelector( '.mdi.mdi-chevron-down' )?.classList.remove( 'mdi-rotate-180' );
};

expandables.forEach( expandable => {
    expandable.addEventListener( 'click', e => {
        if ( Array.from( expandables ).map( _ => _.classList.contains( 'active' ) ).reduce( ( p, c ) => p || c, false ) ) {
            Array.from( expandables ).filter( _ => _.classList.contains( 'active' ) ).forEach( _ => {
                if ( _ === expandable ) {
                    expandable_deactive( _ );
                } else {
                    expandable_deactive( _ );
                    expandable_active( expandable );
                }
            } );
        } else {
            expandable_active( expandable );
        }
    } );
} );
