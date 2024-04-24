<?php include_once "common/config.php"; include_once('common/mysqli_connect.php');?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
    <title><?php echo $sSiteTitle; ?></title>
    <meta name="description" content="<?php echo $sSiteTitle; ?>">
    <meta name="keywords" content="<?php echo $sSiteTitle; ?>">
    <meta http-equiv="refresh" content="">
    <meta name="author" content="<?php echo $sAuthor; ?>">
    <meta name="Developer" content="<?php echo $sDeveloper; ?>">
    <meta name="resource-type" content="document">
    <meta name="contact" content="<?php echo $sEmail; ?>">
    <meta name="copyright" content="Copyright (c) <?php echo gmdate("Y"); ?>. All Rights &reg; Reserved by <?php echo $sSiteURL; ?>.">
    <meta name="robots" content="index, follow">
    <meta name="googlebot" content="index, follow">
    <meta name="googlebot-news" content="index, follow">
    <meta name="msnbot" content="index, follow">
    <meta property="fb:app_id" content="<?php echo $sAppId; ?>">
    <meta property="og:site_name" content="<?php echo $sSiteName; ?>">
    <meta property="og:title" content="<?php echo $sSiteTitle; ?>">
    <meta property="og:description" content="<?php echo $sSiteTitle; ?>">
    <meta property="og:url" content="<?php echo $sSiteURL; ?>">
    <meta property="og:type" content="article">
    <meta property="og:image" content="<?php echo $sLogoURLfb; ?>">
    <meta property="og:locale" content="en_US">
    <link rel="image_src" href="<?php echo $sLogoURLfb; ?>">
    <link rel="canonical" href="<?php echo $sSiteURL; ?>">
    <link type="image/x-icon" rel="shortcut icon" href="<?php echo $sFavicon; ?>">
    <link type="image/x-icon" rel="icon" href="<?php echo $sFavicon; ?>">

    <?php
echo $sCSSBootStrap;
echo $sCSSFontAwesome;
echo $sGoogleFont;
echo $sCSSEMM;
?>

</head>

<body>
    <main>
        <div class="page-wrapper">
			<div class="body-container">
				<?php include_once "common/header.php";?>
				<div id="container">
                    <div class="about-page-area">
                        <div class="about-page-wrapper">
                            <?php $about = mysqli_query($connEMM,"SELECT AboutBrief,AboutAward,AboutExhibitions,AboutPress FROM com_about WHERE Deletable=1 LIMIT 1");
                            $row = mysqli_fetch_assoc($about);
                            echo $row['AboutBrief'].'<br>';
                            echo '<h1>Awards</h1><br>';
                            echo $row['AboutAward'].'<br>';
                            echo '<h2>Exhibitions</h2><br>';
                            echo $row['AboutExhibitions'].'<br>';
                            echo '<h2>Selected Press</h2><br>';
                            echo $row['AboutPress'].'<br>';?>
                            <!-- <p>Shahria Sharmin is a freelance photographer based in Dhaka, Bangladesh.
                                After
                                doing her
                                Masters in Public Administration from the University of Dhaka, Shahria
                                pursued her
                                further study at Pathshala South Asian Media Academy in Bangladesh where
                                she
                                became
                                fascinated with the social history of photography and the evolution of
                                identity,
                                sexuality and gender in relationship to material culture. ‘Call me
                                Heena’
                                Shahria’s
                                ongoing project, takes her interest in photography’s connection with
                                identity to explore
                                and express the diversity of human experience. In 2014, she was named
                                the
                                second place
                                winner of the Alexia Foundation student grant for her project, ‘Call me
                                Heena’. The same
                                work has been selected in Open Society Foundation, Moving Walls 23 group
                                exhibition in
                                2015. Other awards and honors have included being recognized by
                                International
                                Photographer of the Year IPOTY and Magnum Photography Award 2017. ‘Call
                                me
                                Heena’ was
                                Shortlisted of the first ever Women Photograph grant 2017 in conjunction
                                with the
                                Pulitzer Center on Crisis Reporting.</p>
                            <h1>Awards</h1>
                            <p>2014 Alexia Foundation, 2nd Place Student Grant</p>
                            <p> 2014 FotoVisura, Top Finalist</p>
                            <p> 2014 Pride Photo, 2nd Place under the category, “Getting Closer</p>
                            <p> 2014 LGBTE International Art, The Best Photographer Prize</p>
                            <p> 2014 Mosco Foto Award MIFA, 2nd place in life style category,</p>
                            <p> 2014 Accademia Apulia UK , 2nd place</p>
                            <p> 2015 Renaissance Photography Prize , Finalist</p>
                            <p> 2016 International Photographer of the Year IPOTY</p>
                            <p> 2016 Honorable mention in the Exposure Award</p>
                            <p> 2017 Magnum Photography Award 2017, Juror’s Pick</p>
                            <p> 2017 Women Photograph grant in conjunction with the Pulitzer Center on
                                Crisis,
                                Shortlisted</p>
                            <p> 2018 IPA Documentary Award, Finalist</p>
                            <p> 2019 World Press Photo Joop Swart Master Class</p>
                            <p> 2019 LensCulture B&W Awards, Finalist</p>
                            <p> 2019 World Press Photo 6X6 Global Talent from the Asia</p>
                            <p> 2021 Benrido Award by Hariban Award</p>



                            <h2>Exhibitions</h2>
                            <h5>Collective</h5>
                            <p>2011 “Self-discovery” at Chobi Mela VI</p>
                            <p>2011 BPS 10th national photography competition, Bangladesh</p>
                            <p>2012 iiupe, Photography Exhibition, Bangladesh</p>
                            <p>2014 FotoVisura, Brisbane</p>
                            <p>2014 Photissima Art Fair, Turin</p>
                            <p>2014 Internazionale d’Arte LGBTE II S.A.L.I.G.IA, Turin</p>
                            <p>2014 Pride Photo Award, Old Church, Oudekerksplein 23, Amsterdam</p>
                            <p>2014 Obscura Festival, Penang</p>
                            <p>2015 London College of Communication</p>
                            <p>2015 Getty image gallery, London</p>
                            <p>2015 Beijing Photo Festival</p>
                            <p>2015 Open Society Foundation, Moving walls, New York</p>
                            <p>2015 Angkor Photo Festival, Slideshow, Cambodia</p>
                            <p>2017 Chobi Mela, Bangladesh</p>
                            <p>2017 Auckland Festival of Photography</p>
                            <p>2018 Singapore International Photography Festival SIPF</p>
                            <p>2018 Photo Kathmandu</p>
                            <p>2019 IPF – Hyderabad</p>
                            <p>2021 Format International Photography Festival</p>
                            <p>2021 Bangladesh art week, Dubai</p>
                            <p>2022 F3 – freiraum für fotografie, Berlin, Germany</p>
                            <h5>Individual</h5>
                            <p>2016 Hivos, Humanist Institute for Co-operation with Developing
                                Countries,
                                Netherland</p>
                            <p>2017 Hivos, Old Lutheran Church, Singel 411 / Corner Spui, Amsterdam</p>
                            <h2>Selected Press</h2>
                            <p>2014 <a
                                    href="https://www.huffpost.com/entry/hijras_n_5839324?utm_hp_ref=arts&ncid=fcbklnkushpmg00000063"
                                    target="_blank">
                                    Huffpost </a> Review</p>
                            <p>2014 <a
                                    href="https://www.featureshoot.com/2014/09/dreamy-portraits-capture-hijra-bangladeshs-third-gender/"
                                    target="_blank">Feature
                                    Shoot 
                                </a> Review</p>
                            <p>2014 <a
                                    href="https://www.dailymail.co.uk/news/article-2767125/Poignant-pictures-life-outcast-transgender-people-Bangladesh.html"
                                    target="_blank">Mail
                                    Online
                                </a> Review</p>
                            <p>2014 <a href="https://www.imagenation.it/shahriasharmin"
                                    target="_blank">Imagination
                                </a></p>
                            <p>2014 <a
                                    href="http://www.mutantspace.com/shahria-sharmin-photographs-presence-absence/"
                                    target="_blank">Mutantspace
                                </a> </p>
                            <p>2015 <a
                                    href="https://lens.blogs.nytimes.com/2015/03/18/bangladeshs-third-gender/?_r=0"
                                    target="_blank">lens
                                    Blog – The New York Times 
                                </a> Review</p>
                            <p>2015 <a href="https://monovisions.com/bangladeshs-third-gender/"
                                    target="_blank">Monovisions
                                </a> </p>
                            <p>2015 <a
                                    href="https://abcnews.go.com/International/photos/bangladeshs-hijras-seek-greater-acceptance-35433892/image-bangladeshs-hijras-seek-greater-acceptance-35434131"
                                    target="_blank">abc
                                    News
                                </a> </p>
                            <p>2015 <a href="http://internationalphotomag.com/bangladeshs-third-gender/"
                                    target="_blank">International
                                    Photography Magazine
                                </a> </p>
                            <p>2017 <a href="http://www.chobimela.org/shahria-sharmin"
                                    target="_blank">Chobi
                                    Mela
                                </a> </p>
                            <p>2017 <a
                                    href="http://www.bbc.com/culture/story/20170720-the-semi-sacred-third-gender-of-south-asia?ocid=ww.social.link.facebook"
                                    target="_blank">BBC
                                    Culture
                                </a> </p>
                            <p>2017 <a
                                    href="http://editions-jentayu.fr/numero-6/shahria-sharmin-appelez-moi-heena/"
                                    target="_blank">Éditions
                                    Jentayu
                                </a> </p>
                            <p>2017 <a
                                    href="http://www.wionews.com/south-asia/what-it-means-to-be-a-hijra-in-bangladesh-18453"
                                    target="_blank">Wino
                                </a> Review</p>
                            <p>2018<a
                                    href="https://hyperallergic.com/468750/whose-and-whom-the-body-as-a-political-landscape-photo-kathmandu/?fbclid=IwAR1ov5hKkzN8naJGMsXZuxdoPljwXAaUh-eVFs9RVDGYhu10dftHBU09By4"
                                    target="_blank">Hyperallergic
                                </a> Review</p>
                            <p>2018 <a
                                    href="https://www.dhakatribune.com/around-the-web/2018/05/31/bangladeshi-photographer-a-finalist-at-ipa-documentary-award-2018"
                                    target="_blank">DhakaTribune
                                </a> </p>
                            <p>2019 <a href="https://kwerfeldein.de/2019/09/12/shahria-sharmin/"
                                    target="_blank">kwerfeldein
                                </a> </p>
                            <p>2019 <a href="https://www.dodho.com/call-me-heena-by-shahria-sharmin/"
                                    target="_blank">dodho
                                    magazine
                                </a> </p>
                            <p>2019 <a
                                    href="https://witness.worldpressphoto.org/when-home-wont-let-you-stay-by-shahria-sharmin-20cb7cf233ed"
                                    target="_blank">Witness
                                </a> </p>
                            <p>2020<a href="https://www.amnesty.nl/wordt-vervolgd/rohingya-bangladesh"
                                    target="_blank">Wordt
                                    Vervolgd –
                                    Amnesty International
                                </a> </p>
                            <p>2020<a href="http://neocha.com/magazine/call-me-heena"
                                    target="_blank">Neocha
                                    magazine
                                </a> </p>
                            <p>2020 <a href="https://www.fotofemmeunited.com/article/204"
                                    target="_blank">Foto Femme
                                    United
                                </a> </p>
                            <p>2020<a href="https://www.4revues.fr/6mois/a-1685-le-petit-refuge.html"
                                    target="_blank">6Mois
                                </a> </p>
                            <h2><a href="https://shahriasharmin.com/test/wp-content/uploads/2017/11/output.mp4"
                                    target="_blank">Dummy
                                    Book</a>
                            </h2> -->
                        </div>
                    </div>
				</div>
			</div>
		</div>
    </main>



<?php echo $sJSjQuery; ?>
<?php echo $sJSBootStrap;?>
<script>
	  var dropdown = document.getElementsByClassName("dropdown-btn");
	var i;

	for (i = 0; i < dropdown.length; i++) {
		dropdown[i].addEventListener("click", function() {
			this.classList.toggle("active");
			var dropdownContent = this.nextElementSibling;
			if (dropdownContent.style.display === "block") {
				dropdownContent.style.display = "none";
			} else {
				dropdownContent.style.display = "block";
			}
		});
	};
</script>
<?php echo $sJSEMM; ?>
</body>

</html>