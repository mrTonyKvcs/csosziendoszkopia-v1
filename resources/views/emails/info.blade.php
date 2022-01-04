<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
</head>
<body>
    <h1>Sikeres online bejelentkezés!</h1>
    {{-- <h1>Sikeres online fizetés és bejelentkezés!</h1> --}}
    <p>Az időpontja: {{ $appointment }}</p>

    @if($medicalExamination === 'gasztroszkopia')

        <h3><strong>Gyomortükrözés előtti teendők:</strong></h3>
        <p>A gyomortükrözés éhgyomorra történik, emiatt a vizsgálat napján, a vizsgálat előtt sem szilárd, sem folyékony étel
nem fogyasztható.</p>
        <p><strong>Ha reggeli órákban </strong>történik a vizsgálat, akkor a vizsgálat előtt éjféltől nem szabad enni, és inni.</p>
        <p><strong>Ha délutáni, esti órákban </strong>történik a vizsgálat, akkor a vizsgálat előtt 8 órával ne étkezzen, és a gyomortükrözés előtt
4 órával már inni sem szabad.</p>
        <p>A dohányzás is kerülendő, mert jelentősen növeli a gyomor savelválasztását.</p>
        <p>A gyomortükrözést követő egy órán belül nem szabad enni, inni, mert a garatérzéstelenítés miatt megnő a
félrenyelés veszélye.</p>

    @elseif($medicalExamination === 'colonoscopia')

        <h3><strong>Vastagbéltükrözés előtti teendők – ENDOGOL hashajtóval történő felkészülés:</strong></h3>
        <p>A vizsgálat akkor értékelhető, ha tisztára „mosott” beleket vizsgálunk.</p>
        <p>Ennek feltétele a korrekt hashajtás és a bőséges folyadékbevitel.</p>

        <p><strong>5 nappal a vizsgálat előtt kerülje az alábbi ételeket:</strong></p>
        <ul>
            <li>műzli, korpa</li>
            <li>teljes kiőrlésű pékárú</li>
            <li>zöldségek (paprika, paradicsom, saláta…stb.)</li>
            <li>gyümölcs (szőlő, banán, narancs…stb.)</li>
            <li>gyümölcs joghurt</li>
            <li>tökfőzelék, mák</li>
        </ul>

        <p><strong>Fogyasszon bőségesen folyadékot! Ne igyon tejet, vagy tejtartalmú italokat! </strong></p>
        <p><strong>Ne egyen magas rosttartalmú ételeket, úgymint gyümölcs, zöldség, mogyoró, dió, napraforgó, tökmag, chia mag, mák, rizs, teljes kiörlésű pékárú.</strong></p>
        <p><strong>A vizsgálatot megelőző napon </strong>ehet egy könnyű reggelit (pl. főtt tojás, pirítós), de utána szilárd ételt nem fogyaszthat. Ha nagyon éhes, szopogasson cukrot, egyen mézet.</p>
        <p><strong>Délelőtt 10 órakor </strong>oldjon fel 2 tasak ENDOGOL port 2 liter vízben, majd 1-2 óra alatt igya meg.</p>
        <p><strong>Délután </strong> csak folyadék (pl. szűrt almalé, fehérszőlő ital, kávé-tea cukorral, szűrt húsleves, ízesített szénsavmentes ásványvíz)</p>
        <p><strong>15 órakor </strong>oldjon fel 2 tasak ENDOGOL port 2 liter vízben, majd 1-2 óra alatt igya meg.</p>
        <p>Folyadékból szükség szerint fogyaszthat a vizsgálat napján is.</p>
        <p>Ha délutánra esik a vizsgálat időpontja, bőséges folyadékbevitel (kb. 3-4 liter)</p>
        <p><strong>Szokásos gyógyszereit vegye be, kivéve az antidiabetikus készítményeket (cukorgyógyszerek). Ha vastablettát szed, annak szedését a vizsgálat előtt 1 héttel függessze fel.</strong></p>
        <p><strong>A megbeszélt időpontban jelentkezzen a vizsgálatra. A vizsgálatra hozzon magával 1 pár papucsot és maszkot. Amennyiben bódítást szeretne kérni, hozzon magával kísérőt, mert aznap nem vezethet. </strong></p>

    @endif
</body>
</html>
