<?php
/**
 * Template Name: עותק עבודה — אודות
 * About work copy — isolated editorial layout.
 */
get_header();
the_post();
?>

<main class="about-page">
	<section class="about-hero" aria-labelledby="about-page-title">
		<div class="about-hero__image" aria-hidden="true"></div>
		<div class="about-hero__grain" aria-hidden="true"></div>
		<div class="about-hero__copy">
			<p class="about-kicker">קרן הלל · קולנוע ישראלי</p>
			<h1 id="about-page-title">סיפור צריך<br><span>מקום להישמע.</span></h1>
			<p class="about-hero__lead">אנחנו פותחים את הדלת ליוצרים ולקולות שמרחיבים את הסיפור הישראלי.</p>
		</div>
		<span class="about-hero__index" aria-hidden="true">01 / 04</span>
	</section>

	<section class="about-manifesto">
		<div class="about-manifesto__aside">
			<span>קרן הלל</span>
			<i aria-hidden="true"></i>
		</div>
		<div class="about-manifesto__content">
			<h2>יצירה עם משמעות.<br><span>קול ישראלי מגוון.</span></h2>
			<div class="about-manifesto__text">
				<p>קרן הלל הוקמה מתוך רצון לקדם ולעודד יצירה שיש בה משמעות ערכית וחברתית, המשפיעה ומעצבת את הזהות הישראלית. אנו מאמינים שקולנוע הוא כלי ביטוי — הן של היוצרים והן של רוח העם. דווקא בשל כך, לצעדים הראשונים של יוצרים יש משמעות מיוחדת וחשובה.</p>
				<p>הקרן אינה מקדמת אג׳נדות ואינה קרן ״מטעם״. לצד זאת, אנו רואים חשיבות עצומה ביצירה לא מתנצלת, שנאמנה לפנימיות של היוצר.</p>
				<p>במשך שנים היה פס הקול של קרנות הקולנוע אחיד ומונוטוני, ללא צבעים וללא גיוון משמעותי, ולא נתן מקום לחשיבה אחרת שלא השתייכה לזרם המרכזי. קרן הלל הוקמה כדי לאפשר גיוון ולתת לגיטימציה אמיתית לקולות נוספים.</p>
			</div>
		</div>
	</section>

	<section class="about-principles" aria-labelledby="principles-title">
		<div class="about-principles__heading">
			<p class="about-kicker">מה מניע אותנו</p>
			<h2 id="principles-title">שלושה עקרונות.<br><span>כיוון אחד.</span></h2>
		</div>
		<div class="about-principles__list">
			<article><span>01</span><h3>חופש יצירתי</h3><p>לתת ליוצרים מרחב לפתח קול אישי ולספר סיפור שנאמן לאמת שלהם.</p></article>
			<article><span>02</span><h3>מקצועיות</h3><p>ליווי, כלים וחיבורים שמקדמים כל יצירה מהרעיון הראשון ועד למסך.</p></article>
			<article><span>03</span><h3>השפעה</h3><p>יצירה שמרחיבה את השיח ומחברת בין אנשים, קהילות וסיפורים.</p></article>
		</div>
	</section>

	<section class="about-timeline" aria-labelledby="timeline-title">
		<div class="about-timeline__visual">
			<img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/images/ourstory-photo-right.png' ); ?>" alt="">
			<span aria-hidden="true">REC</span>
		</div>
		<div class="about-timeline__content">
			<p class="about-kicker">אחרי 7 באוקטובר</p>
			<h2 id="timeline-title">האומץ<br><span>להשמיע.</span></h2>
			<div class="about-timeline__statement">
				<p>החשיבות שבגיוון קולות ובאומץ של יוצרים התעצמה דווקא לאחר 7 באוקטובר. שם חווינו את התוצאות הקשות של קול אחיד, מונוטוני ולא מגוון.</p>
				<p>האומץ להשמיע גם דברים שאינם נוחים להשמעה התברר כהכרחי ומהותי.</p>
			</div>
		</div>
	</section>

	<section class="about-closing">
		<p>הסיפור הישראלי גדול יותר<br>כשהוא כולל <span>את כולנו.</span></p>
		<a href="<?php echo esc_url( home_url( '/#projects' ) ); ?>">לפרויקטים שלנו <span aria-hidden="true">←</span></a>
	</section>
</main>



<?php get_footer(); ?>
