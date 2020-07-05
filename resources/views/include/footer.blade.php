<!-- FOOTER -->
<section id="footer">


    <!-- SOCIAL ICONS -->
    <ul class="social-icons scroll-animated">

        @foreach ($socials as $social)
        <li><a href="{{ $social->url }}" target="_blank"><i class="fa {{ $social->icon }}" aria-hidden="true"></i></a></li>
        @endforeach
    </ul>
    <p style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif">Developed by Izzat Ala Eddine</p>
    <!-- /SOCIAL ICONS -->
</section>
<!-- /FOOTER -->
