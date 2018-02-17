<footer class="bunntekst">
  <div class="bunntekst__holder">
    <div class="bunntekst__enkel">
      <!-- tre bokser instagram -->
      {!! do_shortcode('[wdi_feed id="1"]') !!}
      <a href="https://www.instagram.com/linjeforeningendelta/" target="_blank">&nbsp; @linjeforeningendelta</a>
    </div>
    <div class="bunntekst__enkel">
      <!-- Informasjon -->
      <h3>Informasjon</h3>
      <p>
      Post: NV-Fakultetet, Realfagbygget<br>
      Høgskoleringen 5, 7491 Trondheim<br><br>
      Mail til styret: <a href="mailto:delta@delta.org.ntnu.no">delta@delta.org.ntnu.no</a><br>
      Organisasjonsnummer: 996 510 352</p>
      <div class="bunntekst__sosialt">
        <a href="https://www.facebook.com/DeltaNTNU/" class="facebook"><span>Facebook</span></a>
        <a href="https://twitter.com/DeltaNTNU" class="twitter"><span>Twitter</span></a>
        <a href="https://www.instagram.com/linjeforeningendelta/" class="instagram"><span>Instagram</span></a>
        <a href="https://www.youtube.com/channel/UC9qc2CyTJWHRa1dwPWOjtwA" class="youtube"><span>Youtube</span></a>
      <!-- Nyhetsbrev -->
      <form action="http://list.stud.ntnu.no/mailman/subscribe/deltanews" method="post">
        <label for="email">E-post</label>
        <input type="text" name="email" size="30" value="" autocomplete="off" placeholder="E-post">

        <label for="fullname">Navn</label>
        <input type="text" name="fullname" size="30" value="" placeholder="Navn">
        <input type="hidden" name="digest" value="0">
        <input type="hidden" name="language" value="no">
        <input type="submit" name="Submit" value="Meld på nyhetsbrev">
      </form>
      </div>
    </div>
    <div class="bunntekst__enkel">
      {!! do_shortcode('[wdi_feed id="2"]') !!}
      <a href="https://www.instagram.com/explore/tags/linjeforeningendelta/" target="_blank">&nbsp; #linjeforeningendelta</a>
    </div>
  </div>
</footer>
