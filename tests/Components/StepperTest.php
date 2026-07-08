<?php

it('wires up the haloStepper data with the current step', function () {
    expect(renderComponent('stepper.index', ['current' => 2, 'slot' => 'Steps']))->toContain('haloStepper(2)');
});

it('defaults to the first step', function () {
    expect(renderComponent('stepper.index', ['slot' => 'Steps']))->toContain('haloStepper(1)');
});

it('renders a step with its number and title', function () {
    $html = renderComponent('stepper.step', ['step' => 1, 'title' => 'Account']);

    expect($html)
        ->toContain('Account')
        ->toContain('isActive(1)')
        ->toContain('isComplete(1)');
});

it('renders a connecting line unless it is the last step', function () {
    $withConnector = renderComponent('stepper.step', ['step' => 1, 'title' => 'Account']);
    $lastStep = renderComponent('stepper.step', ['step' => 2, 'title' => 'Confirm', 'last' => true]);

    expect($withConnector)->toHaveClass('bg-halo-border');
    expect($lastStep)->not->toContain('bg-halo-border');
});
