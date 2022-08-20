console.log('nice to be needed')


window.onload = function() {
	if(document.querySelector('#ssr-b-nav')){
		const footerY = footer.getBoundingClientRect().y;
		const footerNav = document.querySelector('#ssr-b-nav');
		const footerHeight = footer.getBoundingClientRect().height;
		const body = document.body;
		const html = document.documentElement;
		const pageHeight = Math.max(body.scrollHeight, body.offsetHeight, html.clientHeight, html.scrollHeight, html.offsetHeight);
	
		window.onscroll = function(ev) {
			const footerNav = document.querySelector('#ssr-b-nav');
		    if ((window.innerHeight + window.pageYOffset) >= pageHeight-footerHeight) {
		          const moveIt = (window.innerHeight + window.pageYOffset)-(pageHeight-footerHeight);
		       //console.log((window.innerHeight + window.pageYOffset)-(pageHeight-footerHeight));
		       footerNav.style.bottom = moveIt+'px';
		    }
		    if ((window.innerHeight + window.pageYOffset) < pageHeight-footerHeight) {
		    	footerNav.style.bottom = '0px';
		    }
		};
	}
}
