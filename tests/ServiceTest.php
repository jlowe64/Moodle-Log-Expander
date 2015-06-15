<?php namespace Tests;
use \LogExpander\Service as MoodleService;

class ServiceTest extends TestCase {
    /**
     * Sets up the tests.
     * @override TestCase
     */
    public function setup() {
        $this->service = new MoodleService(new TestRepository((object) [], $this->cfg));
    }

    /**
     * Tests the readCourseViewedEvent method of the MoodleService.
     */
    public function testReadCourseViewedEvent() {
        $test_data = $this->constructCourseViewed();
        $event = $this->service->readCourseViewedEvent($test_data);
        $this->assertCourseViewed($test_data, $event);
    }

    /**
     * Tests the readModuleViewedEvent method of the MoodleService.
     */
    public function testReadModuleViewedEvent() {
        $test_data = $this->constructPageViewed();
        $event = $this->service->readModuleViewedEvent($test_data);
        $this->assertModuleViewed($test_data, $event, 'page');
    }

    /**
     * Tests the readAttemptStartedEvent method of the MoodleService.
     */
    public function testReadAttemptStartedEvent() {
        $test_data = $this->constructAttemptStarted();
        $event = $this->service->readAttemptStartedEvent($test_data);
        $this->assertAttemptStarted($test_data, $event);
    }

    /**
     * Tests the readUserLoggedinEvent method of the MoodleService.
     */
    public function testReadUserLoggedinEvent() {
        $test_data = $this->constructUserLoggedin();
        $event = $this->service->readUserLoggedinEvent($test_data);
        $this->assertUserLoggedin($test_data, $event);
    }

    /**
     * Tests the readUserLoggedoutEvent method of the MoodleService.
     */
    public function testReadUserLoggedoutEvent() {
        $test_data = $this->constructUserLoggedout();
        $event = $this->service->readUserLoggedoutEvent($test_data);
        $this->assertUserLoggedout($test_data, $event);
    }

    /**
     * Tests the readAssignmentGradedEvent method of the MoodleService.
     */
    public function testReadAssignmentGradedEvent() {
        $test_data = $this->constructAssignmentGraded();
        $event = $this->service->readAssignmentGradedEvent($test_data);
        $this->assertAssignmentGraded($test_data, $event);
    }

    /**
     * Tests the readAssignmentSubmittedEvent method of the MoodleService.
     */
    public function testReadAssignmentSubmittedEvent() {
        $test_data = $this->constructAssignmentSubmitted();
        $event = $this->service->readAssignmentSubmittedEvent($test_data);
        $this->assertAssignmentSubmitted($test_data, $event);
    }    
}
