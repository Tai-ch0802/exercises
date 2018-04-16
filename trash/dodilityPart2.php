<?php

function run($target)
{
	// empty
	if (empty($target)) {
		return count($target);
	}

	$response = getResponse($target);

	return $response;
}


function getSliceCutKey($target, $key = 0, $isGt = true)
{

	if (!isset($target[$key+1])) {
		// 因為從遞迴進來的$key++ 是期望會有的, 但實際沒有所以將它扣回去
		return --$key;
	}

	if ($target[$key] > $target[$key+1] && $isGt === true) {
		$key++;
		return getSliceCutKey($target, $key, false);
	} elseif ($target[$key] < $target[$key+1] && $isGt === false) {
		$key++;
		return getSliceCutKey($target, $key, true);
	}
	
	// TODO 三個以上才能算是一片
	if ($key === 1 || $key === 2) {
		return --$key;
	}
	return $key;
}

function getResponse($target, $answer = 0)
{
	// when only one
	if (count($target) === 1) {
		return ++$answer;
	}

	// Start
	if ($target[0] < $target[1]) {
		$sliceKey = getSliceCutKey($target, 0, false);
	}else {
		$sliceKey = getSliceCutKey($target);
	}

	$lastSliceLength = count($target);
	for ($i=0; $i<=$sliceKey; $i++) {
		array_shift($target);
	}
	$answer++;

	if (!empty($target)) {
		return 	getResponse($target, $answer);
	}

	return $answer;
}


$target = [
	6,	//1
	1,	//1
	3,	//1
	0,	//1
	-1,	//2
	3,	//2
	2,	//2
	5,	//2
	7,	//3
	7,	//4
	8,	//5
];
$expect = 5;
$actually = run($target);
print_r("Expect: {$expect}  Actually: {$actually}" . PHP_EOL);


$target = [];
$expect = 0;
$actually = run($target);
print_r("Expect: {$expect}  Actually: {$actually}" . PHP_EOL);

$target = [1];
$expect = 1;
$actually = run($target);
print_r("Expect: {$expect}  Actually: {$actually}" . PHP_EOL);

$target = [2,1];
$expect = 2;
$actually = run($target);
print_r("Expect: {$expect}  Actually: {$actually}" . PHP_EOL);

$target = [
	1,	//1
	7,	//2
	11,	//2
	9,	//2
	10,	//2
	10,	//3
];
$expect = 3;
$actually = run($target);
print_r("Expect: {$expect}  Actually: {$actually}" . PHP_EOL);


$target = [
	1,	//1
	2,	//2
	3,	//3
	4,	//4
	5,	//5
	6,	//6
	7,	//7
	8,	//8
	9,	//9
	10,	//10
	11,	//10
	6,	//10
];
$expect = 10;
$actually = run($target);
print_r("Expect: {$expect}  Actually: {$actually}" . PHP_EOL);


