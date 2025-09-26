<?php

use App\Enums\PostType;

describe('PostType Enum', function () {
    test('values', function () {
        expect(PostType::ARTICLE->value)->toBe('article');
        expect(PostType::PAGE->value)->toBe('page');
    });

    test('labels', function () {
        expect(PostType::ARTICLE->getLabel())->toBe('Article');
        expect(PostType::PAGE->getLabel())->toBe('Page');
    });

    test('icons', function () {
        expect(PostType::ARTICLE->getIcon())->toBe('heroicon-o-document-text');
        expect(PostType::PAGE->getIcon())->toBe('heroicon-o-document');
    });

    test('colors', function () {
        expect(PostType::ARTICLE->getColor())->toBe('primary');
        expect(PostType::PAGE->getColor())->toBe('secondary');
    });

    test('is method', function () {
        expect(PostType::ARTICLE->is('article'))->toBeTrue();
        expect(PostType::ARTICLE->is('page'))->toBeFalse();
        expect(PostType::PAGE->is('page'))->toBeTrue();
        expect(PostType::PAGE->is('article'))->toBeFalse();
        expect(PostType::ARTICLE->is(null))->toBeFalse();
    });

    test('getValues method', function () {
        $values = PostType::getValues();
        expect($values)->toBeArray();
        expect($values)->toContain('article', 'page');
        expect($values)->toHaveCount(2);
    });
});
