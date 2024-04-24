<?php if(filesize("xhtml/gen_breaking.htm")>10){ ?>
<section>
<div class="container-fluid">
<div class="row DBeaking DMargin0">
	<div class="col-sm-1 DPadding0"><p>ব্রেকিং </p></div>
	<div class="col-sm-11 DPadding0">
		<marquee direction="left" speed="normal" scrollamount="4" behavior="scroll" onMouseOver="this.stop();" onMouseOut="this.start();">
			<?php include_once("xhtml/gen_breaking.htm"); ?>
		</marquee>
	</div>
</div>
</div>
</section>
<?php }elseif(filesize("xhtml/gen_scroll.htm")>10){ ?>
<section>
<div class="container-fluid">
<div class="row DScroll DMargin0">
	<div class="col-sm-1 DPadding0"><p>শিরোনাম </p></div>
	<div class="col-sm-11 DPadding0">
		<marquee direction="left" speed="normal" scrollamount="4" behavior="scroll" onMouseOver="this.stop();" onMouseOut="this.start();">
			<?php // include_once("xhtml/gen_scroll.htm"); ?>
			<a href=""><span><img src="https://www.daily-bangladesh.com/media/common/Sign.png" alt="শিরোনাম" title="শিরোনাম">কাউন্সিলে শেখ হাসিনা আওয়ামী লীগের সভাপতি পুনঃনির্বাচিত; দ্বিতীয় মেয়াদে সাধারণ সম্পাদক হলেন ওবায়দুল কাদের </span></a>
			<a href=""><span><img src="https://www.daily-bangladesh.com/media/common/Sign.png" alt="শিরোনাম" title="শিরোনাম">তৃণমূল থেকে কেন্দ্র পর্যন্ত সবাইকে কাজ করতে হবে: শেখ হাসিনা; আলোচনা করে পূর্ণাঙ্গ কমিটি ও ১০ মার্চের মধ্যে জেলা কমিটি </span></a>
		</marquee>
	</div>
</div>
</div>
</section>
<?php } ?>