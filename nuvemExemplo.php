<style type="text/css">

.nuvem {
    font-family: arial;
    width: 250px;
    text-align: justify;
    border: 1px solid black;
    padding: 5px;
}

.tag10 {
    font-size: 32px;
}
.tag9 {
    font-size:30px;
}
.tag8 {
    font-size: 28px;
}
.tag7 {
    font-size: 26px;
}
.tag6 {
    font-size: 24px;
}
.tag5 {
    font-size: 22px;
}
.tag4 {
    font-size: 20px;
}
.tag3 {
    font-size: 18px;
}
.tag2 {
    font-size: 16px;
}
.tag1 {
    font-size: 13px;
}
.tag0 {
    font-size: 11px;
}
</style>

<?

include 'class.nuvemtags.php'; 

$Nuvem = new NuvemTags(array('natureza', 'software', 'software', 'blogsfera', 'cotidiano', 'carros', 'tecnologia', 'tecnologia', 'tecnologia', 'tecnologia', 'software', 'software', 'software', 'software', 'tecnologia', 'tecnologia', 'tecnologia', 'tecnologia', 'tecnologia', 'links', 'php', 'php', 'php', 'web 2.0', 'web 2.0', 'php', 'php', 'php', 'php', 'php', 'php', 'php', 'php', 'php', 'php', 'php', 'php', 'css', 'php', 'tecnologia', 'software', 'cotidiano', 'php', 'php', 'tecnologia', 'carros', 'web 2.0', 'negócios'));

$Nuvem->addPalavra('DanielPio');

echo '<div class="nuvem">';
$NuvemTags = $Nuvem->mostraNuvem();

foreach($NuvemTags as $Tag)
{
    echo '<span class="tag' . $Tag['classe'] . '">' . $Tag['palavra'] . '</span> ';
}

echo '</div><br />Esse exemplo é parte do artigo "<a href="" target="_blank">Nuvem de Tags com PHP</a>".';

?> 