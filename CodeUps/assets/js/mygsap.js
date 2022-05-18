// GSAP
// TweenMax.fromTo('.swiper-wrapper', 1, {height: 0}, {height:'100vh'});

// TweenMax.staggerFromTo('.slide-content__sentence', 0.3, {x:'1em',y:'1.2em',rotateZ: 180} ,{x: 0, y: 0 ,rotateZ: 0, ease: Power2.easeInOut, delay: 1.2}, 0.05);

// mv
tl = new TimelineMax();
tl.fromTo('.js-swiper-wrapper', 1, {height: 0}, {height:'100vh'})
.addLabel('up')
.staggerFromTo('.slide-content__sentence', 0.3, {x:'1em',y:'1.2em',rotateZ: 180} ,{x: 0, y: 0 ,rotateZ: 0, ease: Power2.easeInOut}, 0.05, 'up+=0.2')
.fromTo('.slide-content__txt', 1, {opacity:0, y: '100%'}, {opacity: 1, y: '0%'}, 'up+=1.2');

// scrolltrigger
gsap.registerPlugin(ScrollTrigger);
// タイトル
var custom_anime = gsap.timeline({
  scrollTrigger: {
    trigger: ".js-content", //アニメーションが始まるトリガーとなる要素
    start: "top bottom",
  }
});

/*---1つ目の要素---*/
custom_anime.to('.js-content-mask', //アニメーションする要素
  {duration: 1, x: "101%", opacity:1, ease: Power2.easeInOut}
);

/*---２つ目の要素---*/
custom_anime.to('.js-content-maskWrapper span', //アニメーションする要素
  { duration: 1, opacity: 1}
);

var custom_anime = gsap.timeline({
  scrollTrigger: {
    trigger: ".js-works", //アニメーションが始まるトリガーとなる要素
    start: "top bottom",
  }
});

/*---1つ目の要素---*/
custom_anime.to('.js-works-mask', //アニメーションする要素
  {duration: 1, x: "101%", opacity:1, ease: Power2.easeInOut}
);

/*---２つ目の要素---*/
custom_anime.to('.js-works-maskWrapper span', //アニメーションする要素
  { duration: 1, opacity: 1}
);

var custom_anime = gsap.timeline({
  scrollTrigger: {
    trigger: ".js-overview", //アニメーションが始まるトリガーとなる要素
    start: "top bottom",
  }
});

/*---1つ目の要素---*/
custom_anime.to('.js-overview-mask', //アニメーションする要素
  {duration: 1, x: "101%", opacity:1, ease: Power2.easeInOut}
);

/*---２つ目の要素---*/
custom_anime.to('.js-overview-maskWrapper span', //アニメーションする要素
  { duration: 1, opacity: 1}
);

var custom_anime = gsap.timeline({
  scrollTrigger: {
    trigger: ".js-blog", //アニメーションが始まるトリガーとなる要素
    start: "top bottom",
  }
});

/*---1つ目の要素---*/
custom_anime.to('.js-blog-mask', //アニメーションする要素
  {duration: 1, x: "101%", opacity:1, ease: Power2.easeInOut}
);

/*---２つ目の要素---*/
custom_anime.to('.js-blog-maskWrapper span', //アニメーションする要素
  { duration: 1, opacity: 1}
);

// 事業内容アニメーション
(window).addEventListener('load', function() {
	const $window = $(this).width();
	const bp = 767;
	if ($window > bp) {
		gsap.set('.js-content-img', {opacity:0,x: 100}); //初期状態をセット
		gsap.to('.js-content-img', {
			opacity: 1,
			x: 0,
			delay: 0.5,
			scrollTrigger: {
				trigger: '.js-content',
				start: 'top center'
			},
			stagger: {
				from: 'start', //左からアニメーション start、center、edges、random、endが指定できる
				amount: 1 //1秒ズラしてアニメーション
					}
		});
	}
	else {
		gsap.set('.js-content-img', {opacity:0,y: 100}); //初期状態をセット
		gsap.to('.js-content-img', {
			opacity: 1,
			y: 0,
			delay: 1,
			scrollTrigger: {
				trigger: '.js-content',
				start: 'top bottom'
			},
			stagger: {
				from: 'start', //左からアニメーション start、center、edges、random、endが指定できる
				amount: 1 //1秒ズラしてアニメーション
			}
		});
	}
});
//  制作実績アニメーション
var custom_anime = gsap.timeline({
	scrollTrigger: {
		trigger: ".js-works-body", //アニメーションが始まるトリガーとなる要素
		start: "top center"
	}
});

/*---1つ目の要素---*/
custom_anime.to('.js-works-slide img', //アニメーションする要素
	{duration: 1, x: "0%"}
);

/*---２つ目の要素---*/
custom_anime.to('.js-works-txt-title', //アニメーションする要素
	{ duration: 0.5, autoAlpha: 1}
);

/*---3つ目の要素---*/
custom_anime.to('.js-works-txt-desc', //アニメーションする要素
	{ duration: 0.8, autoAlpha: 1}
);

//  企業概要アニメーション
var custom_anime = gsap.timeline({
	scrollTrigger: {
		trigger: ".js-overview-wrapper", //アニメーションが始まるトリガーとなる要素
		start: "top center"
	}
});

/*---1つ目の要素---*/
custom_anime.to('.js-overview-img img', //アニメーションする要素
	{duration: 1, x: "0%"}
);

/*---２つ目の要素---*/
custom_anime.to('.js-overview-txt-title', //アニメーションする要素
	{ duration: 0.5, autoAlpha: 1}
);

/*---3つ目の要素---*/
custom_anime.to('.js-overview-txt-desc', //アニメーションする要素
	{ duration: 0.8, autoAlpha: 1}
);

// ブログアニメーション
ScrollTrigger.matchMedia({
	"(min-width: 768px)": function() {
		gsap.fromTo('.p-card', {
			x : "-109%",
			autoAlpha: 0,
			// delay: 0.5,
		},
		{
			x: 0,
			autoAlpha: 1,
				scrollTrigger: {
					trigger: '.js-cards',
					start: 'top center'
				},
				stagger: {
					from: "start", //左からアニメーション start、center、edges、random、endが指定できる
					amount: 1 //0.1秒ズラしてアニメーション
				}
		});
	},

	"(max-width: 767px)": function() {
		gsap.fromTo('.js-card--1', {
			x: "111%"
		},
		{
			x: 0,
			duration: 0.7,
			scrollTrigger: {
				trigger: '.js-card--1',
				start: 'top center'
			},
		});

		gsap.fromTo('.js-card--2', {
			x: "107%",
		},
		{
			x: 0,
			duration: 0.7,
			scrollTrigger: {
				trigger: '.js-card--2',
				start: 'top center'
			},
		});

		gsap.fromTo('.js-card--3', {
			x: "107%",
		},
		{
			x: 0,
			duration: 0.7,
			scrollTrigger: {
				trigger: '.js-card--3',
				start: 'top center'
			},
		});
	}
});