<?php
$seo = \App\Seo::find(1);
if ($seo) {
    $seo->seo_title = str_ireplace('United States of America', 'India', $seo->seo_title);
    $seo->seo_description = str_ireplace(['United States of America', 'USA'], 'India', $seo->seo_description);
    $seo->seo_keywords = str_ireplace(['USA', 'usa'], 'India', $seo->seo_keywords);
    $seo->save();
    echo "SEO updated.\n";
}
