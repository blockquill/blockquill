<?php

use App\Enums\PostStatus;
use App\Enums\PostType;
use App\Enums\TaxonomyType;

describe('EnumUtilitiesTrait', function () {
    describe('is method', function () {
        test('matches with string values', function () {
            expect(PostStatus::DRAFT->is('draft'))->toBeTrue();
            expect(PostStatus::DRAFT->is('published'))->toBeFalse();
        });

        test('matches with integer values', function () {
            // Using PostStatus enum to test integer comparison
            expect(PostStatus::DRAFT->is(0))->toBeFalse();
            expect(PostStatus::DRAFT->is(1))->toBeFalse();
        });

        test('matches with null values', function () {
            expect(PostStatus::DRAFT->is(null))->toBeFalse();
            expect(PostType::ARTICLE->is(null))->toBeFalse();
            expect(TaxonomyType::CATEGORY->is(null))->toBeFalse();
        });
    });

    describe('getValues method', function () {
        test('returns all PostStatus values', function () {
            $values = PostStatus::getValues();
            expect($values)->toBeArray();
            expect($values)->toHaveCount(3);
            expect($values)->toBe(['draft', 'published', 'scheduled']);
        });

        test('returns all PostType values', function () {
            $values = PostType::getValues();
            expect($values)->toBeArray();
            expect($values)->toHaveCount(2);
            expect($values)->toBe(['article', 'page']);
        });

        test('returns all TaxonomyType values', function () {
            $values = TaxonomyType::getValues();
            expect($values)->toBeArray();
            expect($values)->toHaveCount(2);
            expect($values)->toBe(['category', 'tag']);
        });
    });
});
