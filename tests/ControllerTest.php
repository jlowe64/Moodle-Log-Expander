<?php namespace Tests;
use \LogExpander\Service as MoodleService;
use \LogExpander\Controller as MoodleController;

class ControllerTest extends TestCase {
    /**
     * Sets up the tests.
     * @override TestCase
     */
    public function setup() {
        $this->controller = new MoodleController(new MoodleService(new TestRepository((object) [], $this->cfg)));
    }

    /**
     * Tests the createEvent method of the MoodleController.
     */
    public function testCreateEvent() {
        $test_data = [];
        $event = $this->controller->createEvent($test_data);
        $this->assertEquals(null, $event);
    }

    /**
     * Tests the createEvent method of the MoodleController with the course_viewed event.
     */
    public function testReadCourseViewedEvent() {
        $test_data = $this->constructCourseViewed();
        $event = $this->controller->createEvent($test_data);
        $this->assertCourseViewed($test_data, $event);
    }

    /**
     * Tests the createEvent method of the MoodleController with the page_viewed event.
     */
    public function testReadPageViewedEvent() {
        $test_data = $this->constructPageViewed();
        $event = $this->controller->createEvent($test_data);
        $this->assertModuleViewed($test_data, $event, 'page');
    }

    /**
     * Tests the createEvent method of the MoodleController with the quiz_viewed event.
     */
    public function testReadQuizViewedEvent() {
        $test_data = $this->constructQuizViewed();
        $event = $this->controller->createEvent($test_data);
        $this->assertModuleViewed($test_data, $event, 'quiz');
    }

    /**
     * Tests the createEvent method of the MoodleController with the url_viewed event.
     */
    public function testReadUrlViewedEvent() {
        $test_data = $this->constructUrlViewed();
        $event = $this->controller->createEvent($test_data);
        $this->assertModuleViewed($test_data, $event, 'url');
    }

    /**
     * Tests the createEvent method of the MoodleController with the folder_viewed event.
     */
    public function testReadFolderViewedEvent() {
        $test_data = $this->constructFolderViewed();
        $event = $this->controller->createEvent($test_data);
        $this->assertModuleViewed($test_data, $event, 'folder');
    }

    /**
     * Tests the createEvent method of the MoodleController with the book_viewed event.
     */
    public function testReadBookViewedEvent() {
        $test_data = $this->constructBookViewed();
        $event = $this->controller->createEvent($test_data);
        $this->assertModuleViewed($test_data, $event, 'book');
    }

    /**
     * Tests the createEvent method of the MoodleController with the attempt_started event.
     */
    public function testReadAttemptStartedEvent() {
        $test_data = $this->constructAttemptStarted();
        $event = $this->controller->createEvent($test_data);
        $this->assertAttemptStarted($test_data, $event);
    }

    /**
     * Tests the createEvent method of the MoodleController with the attempt_reviewed event.
     */
    public function testReadAttemptReviewedEvent() {
        $test_data = $this->constructAttemptReviewed();
        $event = $this->controller->createEvent($test_data);
        $this->assertAttemptStarted($test_data, $event);
    }

    /**
     * Tests the createEvent method of the MoodleController with the user_loggedin event.
     */
    public function testReadUserLoggedinEvent() {
        $test_data = $this->constructUserLoggedin();
        $event = $this->controller->createEvent($test_data);
        $this->assertUserLoggedin($test_data, $event);
    }

    /**
     * Tests the createEvent method of the MoodleController with the user_loggedout event.
     */
    public function testReadUserLoggedoutEvent() {
        $test_data = $this->constructUserLoggedout();
        $event = $this->controller->createEvent($test_data);
        $this->assertUserLoggedout($test_data, $event);
    }

    /**
     * Tests the createEvent method of the MoodleController with the assignment_graded event.
     */
    public function testReadAssignmentGradedEvent() {
        $test_data = $this->constructAssignmentGraded();
        $event = $this->controller->createEvent($test_data);
        $this->assertAssignmentGraded($test_data, $event);
    }

    /**
     * Tests the createEvent method of the MoodleController with the assignment_submitted event.
     */
    public function testReadAssignmentSubmittedEvent() {
        $test_data = $this->constructAssignmentSubmitted();
        $event = $this->controller->createEvent($test_data);
        $this->assertAssignmentSubmitted($test_data, $event);
    }    
}
