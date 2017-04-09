Feature: Score After First Move

  Scenario: Two moves with each two shot pins
    When In move user shot "2" pins
    And In move user shot "2" pins
    Then The score is "4"
    
  Scenario: Two moves with two different shot pins
    When In move user shot "2" pins
    And In move user shot "3" pins
    Then The score is "5"
    
  Scenario: Four moves in two frame
    When In move user shot "2" pins
    And In move user shot "3" pins
    And In move user shot "4" pins
    And In move user shot "5" pins
    Then The score is "14"
    And The frame is "3"
    
  Scenario: One move with shot all pins
    When In one move user shot strike
    Then The frame is "2"
    
  Scenario: In first frame user shot 10 pins and do next move
    When In two moves user shot spare
    Then The frame is "2"
    And In two moves user shot spare
    Then The score is "25"
    
  Scenario: In first frame user shot 10 pins in one move and do next move
    When In one move user shot strike
    Then The frame is "2"
    And In move user shot "4" pins
    And In move user shot "5" pins
    Then The score is "28"

  Scenario: In first frame user shot 10 pins in one move and do next moves in two frames
    When In one move user shot strike
    Then The frame is "2"
    And In move user shot "4" pins
    And In move user shot "5" pins
    Then The score is "28"
    And In move user shot "4" pins
    And In move user shot "5" pins
    Then The score is "37"

  Scenario: In two frames user shot 10 pins in first move
    When In one move user shot strike
    Then The frame is "2"
    And In one move user shot strike
    Then The frame is "3"
    And The score is "30"
    
  Scenario: In all frames user shot all pins in first move
    When In one move user shot strike
    And In one move user shot strike
    And In one move user shot strike
    And In one move user shot strike
    And In one move user shot strike
    And In one move user shot strike
    And In one move user shot strike
    And In one move user shot strike
    And In one move user shot strike
    And In one move user shot strike
    And In one move user shot strike
    And In one move user shot strike
    Then The score is "300"

  Scenario: In two frame user shot all pins and do next move
    When In two moves user shot spare
    Then The frame is "2"
    And In two moves user shot spare
    Then The score is "25"
    And In move user shot "4" pins
    And In move user shot "5" pins
    Then The score is "38"

  Scenario: In two frame user shot all pins and do next move
    When In one move user shot strike
    Then The frame is "2"
    And In two moves user shot spare
    And In move user shot "2" pins
    And In move user shot "4" pins
    Then The score is "38"