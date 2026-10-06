<?php
// This file is part of Moodle - https://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <https://www.gnu.org/licenses/>.

namespace block_greeting;

/**
 * PHPUnit tests for block_greeting.
 *
 * @package    block_greeting
 * @copyright  2026 kaikgabriel
 * @license    https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @covers \block_greeting
 * @covers \block_greeting\local\greeting_text
 */
final class greeting_test extends \advanced_testcase {
    /**
     * Test that the greeting string is rendered in the block template.
     */
    public function test_greeting_string_is_rendered_in_template(): void {
        $this->resetAfterTest();

        $expected = get_string('greeting', 'block_greeting');
        $page = new \moodle_page();
        $renderer = $page->get_renderer('core');
        $html = $renderer->render_from_template('block_greeting/content', ['greeting' => \block_greeting\local\greeting_text::get_message()]);

        $this->assertStringContainsString($expected, $html);
    }
}
