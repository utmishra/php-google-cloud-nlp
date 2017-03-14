<?php
namespace Google\Cloud\Samples\Language;

require __DIR__ . '/../vendor/autoload.php';

# [START analyze_all]
use Google\Cloud\NaturalLanguage\NaturalLanguageClient;
use Google\Cloud\NaturalLanguage\Annotation;

error_reporting(E_ALL); 
ini_set('display_errors', 1);

/**
 * Find the everything in text.
 * ```
 * analyze_all('Do you know the way to San Jose?');
 * ```
 *
 * @param string $text The text to analyze.
 *
 * @return Annotation
 */
function analyze_all($text)
{
    $language = new NaturalLanguageClient();
    $annotation = $language->annotateText($text, [
        'features' => ['entities', 'syntax', 'sentiment']
    ]);
    return $annotation;
}

function utf8ize($d) {
    if (is_array($d)) {
        foreach ($d as $k => $v) {
            $d[$k] = utf8ize($v);
        }
    } else if (is_string ($d)) {
        return utf8_encode($d);
    }
    return $d;
}

// $sentence = $_POST['sentence'];
$sentence = "Google Cloud offers Natural Language API";
$annotations = analyze_all($sentence);
// echo annotation_to_string($annotations);
print_r($annotations->entities());
