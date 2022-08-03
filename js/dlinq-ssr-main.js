console.log('nice to be needed')


window.onload = function() {
	if(document.querySelector('#ssr-b-nav')){
		const footer = document.querySelector('#footer');
		const footerNav = document.querySelector('#ssr-b-nav');
		document.addEventListener("scroll", (event) => {
		  const yHeight = window.scrollY;
		  const footerHeight = footer.getBoundingClientRect().height;
		  const footerY = footer.getBoundingClientRect().y;
		  if(footer.getBoundingClientRect().y < footerNav.getBoundingClientRect().y + footer.getBoundingClientRect().height){
		     footerNav.style.bottom = footerHeight+'px'
		     }
		  if(footer.getBoundingClientRect().y > footerNav.getBoundingClientRect().y + footer.getBoundingClientRect().height){
		     footerNav.style.bottom = 0+'px'
		     }
		});

	}
}
