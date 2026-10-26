<?php
/**
 * Template Name: עמוד פרויקטים
 */
get_header();
?>
<main class="inner-page projects-index">
	<section class="inner-hero inner-hero--projects site-banner-diagonal">
		<div class="inner-hero__media" aria-hidden="true"></div>
		<div class="camera-frame" aria-hidden="true"><i></i><i></i><i></i><i></i></div>
		<div class="inner-hero__copy">
			<p class="inner-kicker">הפרויקטים של קרן הלל</p>
			<h1>סיפורים מתחילים<br><span>בצעד אחד אמיץ.</span></h1>
			<p>אנחנו בונים מסגרות שבהן יוצרים יכולים לעצור, להקשיב למה שבוער בהם ולהתחיל ליצור.</p>
		</div>
		<span class="inner-rec" aria-hidden="true">REC <b></b></span>
	</section>
<div class="site-banner-filmstrip" aria-hidden="true"></div>

	<section class="projects-intro">
		<p class="inner-kicker">מה קורה עכשיו</p>
		<h2>היוזמות<br><span>שכבר יצאו לדרך.</span></h2>
		<p>כל פרויקט מתחיל מצורך אמיתי ופוגש קבוצה אחרת של יוצרים. הדרך משתנה, אבל המטרה נשארת: לתת לסיפור מקום להפוך ליצירה.</p>
	</section>

	<section class="projects-list" aria-label="רשימת פרויקטים">
		<article class="project-teaser project-teaser--featured">
			<a class="project-teaser__image" href="<?php echo esc_url( home_url( '/projects/kamim-mehadash/' ) ); ?>" aria-label="לפרויקט קמים מחדש">
				<img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/images/project-1-bg.jpg' ); ?>" alt="">
				<span class="project-teaser__number">01</span>
<div class="project-card__frame" aria-hidden="true">
					<span class="tl-v"></span><span class="tl-h"></span>
					<span class="tr-v"></span><span class="tr-h"></span>
					<span class="bl-v"></span><span class="bl-h"></span>
					<span class="br-v"></span><span class="br-h"></span>
				</div>
				<span class="project-card__scene-label">SCENE 02 &middot; TAKE 03</span>
				<span class="project-card__rec"><span class="project-card__rec-text">REC</span><span class="project-card__rec-dot" aria-hidden="true"></span></span>
				
			</a>
			<div class="project-teaser__copy">
				<p class="inner-kicker">עיבוד · יצירה · שיקום</p>
				<h2>קמים מחדש</h2>
				<p>סיפורי פציעה, שיקום ותקווה של חיילים שנפצעו במלחמת ״חרבות ברזל״. מיזם סרטים קצרים בקולם האישי, עם פיילוט מתוכנן של פצועי הקרבות בכפר עזה.</p>
				<a class="inner-button" href="<?php echo esc_url( home_url( '/projects/kamim-mehadash/' ) ); ?>">לפרויקט <span aria-hidden="true">←</span></a>
			</div>
		</article>

		<article class="project-teaser project-teaser--reverse">
			<div class="project-teaser__image">
				<img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/images/project-2-bg.jpg' ); ?>" alt="">
				<span class="project-teaser__number">02</span>
<div class="project-card__frame" aria-hidden="true">
					<span class="tl-v"></span><span class="tl-h"></span>
					<span class="tr-v"></span><span class="tr-h"></span>
					<span class="bl-v"></span><span class="bl-h"></span>
					<span class="br-v"></span><span class="br-h"></span>
				</div>
				<span class="project-card__scene-label">SCENE 02 &middot; TAKE 03</span>
				<span class="project-card__rec"><span class="project-card__rec-text">REC</span><span class="project-card__rec-dot" aria-hidden="true"></span></span>
				
			</div>
			<div class="project-teaser__copy">
				<p class="inner-kicker">ליווי · קולנוע · הדור הבא</p>
				<h2>ליווי פרחי יצירה</h2>
				<p>סטודנטים לקולנוע מלווים תלמידי מגמות בתהליך היצירה, ונותנים להם כלים מקצועיים בדרך לסרט הגמר.</p>
				<span class="project-teaser__soon">העמוד המלא יעלה בקרוב</span>
			</div>
		</article>
	</section>

	<section class="inner-closing">
		<p>יש לכם סיפור<br><span>שרוצה לצאת לדרך?</span></p>
		<a class="inner-button inner-button--outline" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">דברו איתנו <span aria-hidden="true">←</span></a>
	</section>
</main>
<?php get_footer(); ?>
