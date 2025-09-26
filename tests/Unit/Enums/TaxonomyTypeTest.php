<?php

use App\Enums\TaxonomyType;

describe('TaxonomyType Enum', function () {
    test('values', function () {
        expect(TaxonomyType::CATEGORY->value)->toBe('category');
        expect(TaxonomyType::TAG->value)->toBe('tag');
    });

    test('labels', function () {
        expect(TaxonomyType::CATEGORY->getLabel())->toBe('Category');
        expect(TaxonomyType::TAG->getLabel())->toBe('Tag');
    });

    test('icons', function () {
        expect(TaxonomyType::CATEGORY->getIcon())->toBe('heroicon-o-folder');
        expect(TaxonomyType::TAG->getIcon())->toBe('heroicon-o-tag');
    });

    test('colors', function () {
        expect(TaxonomyType::CATEGORY->getColor())->toBe('primary');
        expect(TaxonomyType::TAG->getColor())->toBe('success');
    });

    test('is method', function () {
        expect(TaxonomyType::CATEGORY->is('category'))->toBeTrue();
        expect(TaxonomyType::CATEGORY->is('tag'))->toBeFalse();
        expect(TaxonomyType::TAG->is('tag'))->toBeTrue();
        expect(TaxonomyType::TAG->is('category'))->toBeFalse();
        expect(TaxonomyType::CATEGORY->is(null))->toBeFalse();
    });

    test('getValues method', function () {
        $values = TaxonomyType::getValues();
        expect($values)->toBeArray();
        expect($values)->toContain('category', 'tag');
        expect($values)->toHaveCount(2);
    });
});