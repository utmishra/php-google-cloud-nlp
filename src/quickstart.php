<?php

require __DIR__ . '/../vendor/autoload.php';

use Google\Cloud\NaturalLanguage\NaturalLanguageClient;
use Google\Cloud\NaturalLanguage\Annotation;

$text = "Google offers compute engine";
$language = new NaturalLanguageClient();
$options = array();
$annotation = $language->analyzeSentiment($text, $options);
var_dump($annotation);