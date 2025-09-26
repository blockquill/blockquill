<?php

use App\Enums\PostStatus;

describe('PostStatus Enum', function () {
    test('values', function () {
        expect(PostStatus::DRAFT->value)->toBe('draft');
        expect(PostStatus::PUBLISHED->value)->toBe('published');
        expect(PostStatus::SCHEDULED->value)->toBe('scheduled');
    });

    test('labels', function () {
        expect(PostStatus::DRAFT->getLabel())->toBe('Draft');
        expect(PostStatus::PUBLISHED->getLabel())->toBe('Published');
        expect(PostStatus::SCHEDULED->getLabel())->toBe('Scheduled');
    });

    test('icons', function () {
        expect(PostStatus::DRAFT->getIcon())->toBe('heroicon-o-pencil');
        expect(PostStatus::PUBLISHED->getIcon())->toBe('heroicon-o-check-circle');
        expect(PostStatus::SCHEDULED->getIcon())->toBe('heroicon-o-clock');
    });

    test('colors', function () {
        expect(PostStatus::DRAFT->getColor())->toBe('gray');
        expect(PostStatus::PUBLISHED->getColor())->toBe('success');
        expect(PostStatus::SCHEDULED->getColor())->toBe('warning');
    });

    test('is method', function () {
        expect(PostStatus::DRAFT->is('draft'))->toBeTrue();
        expect(PostStatus::DRAFT->is('published'))->toBeFalse();
        expect(PostStatus::PUBLISHED->is('published'))->toBeTrue();
        expect(PostStatus::SCHEDULED->is('scheduled'))->toBeTrue();
        expect(PostStatus::SCHEDULED->is(null))->toBeFalse();
    });

    test('getValues method', function () {
        $values = PostStatus::getValues();
        expect($values)->toBeArray();
        expect($values)->toContain('draft', 'published', 'scheduled');
        expect($values)->toHaveCount(3);
    });
});