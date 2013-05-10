<?php
/*
 **************************** Creation Log *******************************
File Name                   -  UserTestResult.php
Project Name                -  skillseeker
Description                 -  User Test Result Model
Version                     -  1.0
Created by                  -  Ramandeep Singh
Created on                  -  May 10, 2013
***************************** Update Log ********************************
Sr.NO.		Version		Updated by           Updated on          Description
-------------------------------------------------------------------------

*************************************************************************

*/
class UserTestResult
{
    private $_id;
    private $_firstName;
    private $_lastName;
    private $_emailAddress;
    private $_testId;
    private $_questions;
    private $_answers;
    private $_correctAnswers;
    private $_userCorrectQuestion;
    private $_userCorrectAnswers;
    private $_userIncorrectQuestion;
    private $_userIncorrectAnswers;
    private $_marks;
    private $_totalMarks;
    private $_status;
    private $_createdOn;
    private $_updatedOn;
    
	/**
     * @return the $_id
     */
    public function getId()
    {
        return $this->_id;
    }

	/**
     * @return the $_firstName
     */
    public function getFirstName()
    {
        return $this->_firstName;
    }

	/**
     * @return the $_lastName
     */
    public function getLastName()
    {
        return $this->_lastName;
    }

	/**
     * @return the $_emailAddress
     */
    public function getEmailAddress()
    {
        return $this->_emailAddress;
    }

	/**
     * @return the $_testId
     */
    public function getTestId()
    {
        return $this->_testId;
    }

	/**
     * @return the $_questions
     */
    public function getQuestions()
    {
        return $this->_questions;
    }

	/**
     * @return the $_answers
     */
    public function getAnswers()
    {
        return $this->_answers;
    }

	/**
     * @return the $_correctAnswers
     */
    public function getCorrectAnswers()
    {
        return $this->_correctAnswers;
    }

	/**
     * @return the $_userCorrectQuestion
     */
    public function getUserCorrectQuestion()
    {
        return $this->_userCorrectQuestion;
    }

	/**
     * @return the $_userCorrectAnswers
     */
    public function getUserCorrectAnswers()
    {
        return $this->_userCorrectAnswers;
    }

	/**
     * @return the $_userIncorrectQuestion
     */
    public function getUserIncorrectQuestion()
    {
        return $this->_userIncorrectQuestion;
    }

	/**
     * @return the $_userIncorrectAnswers
     */
    public function getUserIncorrectAnswers()
    {
        return $this->_userIncorrectAnswers;
    }

	/**
     * @return the $_marks
     */
    public function getMarks()
    {
        return $this->_marks;
    }

	/**
     * @return the $_totalMarks
     */
    public function getTotalMarks()
    {
        return $this->_totalMarks;
    }

	/**
     * @return the $_status
     */
    public function getStatus()
    {
        return $this->_status;
    }

	/**
     * @return the $_createdOn
     */
    public function getCreatedOn()
    {
        return $this->_createdOn;
    }

	/**
     * @return the $_updatedOn
     */
    public function getUpdatedOn()
    {
        return $this->_updatedOn;
    }

	/**
     * @param field_type $_id
     */
    public function setId($_id)
    {
        $this->_id = $_id;
    }

	/**
     * @param field_type $_firstName
     */
    public function setFirstName($_firstName)
    {
        $this->_firstName = $_firstName;
    }

	/**
     * @param field_type $_lastName
     */
    public function setLastName($_lastName)
    {
        $this->_lastName = $_lastName;
    }

	/**
     * @param field_type $_emailAddress
     */
    public function setEmailAddress($_emailAddress)
    {
        $this->_emailAddress = $_emailAddress;
    }

	/**
     * @param field_type $_testId
     */
    public function setTestId($_testId)
    {
        $this->_testId = $_testId;
    }

	/**
     * @param field_type $_questions
     */
    public function setQuestions($_questions)
    {
        $this->_questions = $_questions;
    }

	/**
     * @param field_type $_answers
     */
    public function setAnswers($_answers)
    {
        $this->_answers = $_answers;
    }

	/**
     * @param field_type $_correctAnswers
     */
    public function setCorrectAnswers($_correctAnswers)
    {
        $this->_correctAnswers = $_correctAnswers;
    }

	/**
     * @param field_type $_userCorrectQuestion
     */
    public function setUserCorrectQuestion($_userCorrectQuestion)
    {
        $this->_userCorrectQuestion = $_userCorrectQuestion;
    }

	/**
     * @param field_type $_userCorrectAnswers
     */
    public function setUserCorrectAnswers($_userCorrectAnswers)
    {
        $this->_userCorrectAnswers = $_userCorrectAnswers;
    }

	/**
     * @param field_type $_userIncorrectQuestion
     */
    public function setUserIncorrectQuestion($_userIncorrectQuestion)
    {
        $this->_userIncorrectQuestion = $_userIncorrectQuestion;
    }

	/**
     * @param field_type $_userIncorrectAnswers
     */
    public function setUserIncorrectAnswers($_userIncorrectAnswers)
    {
        $this->_userIncorrectAnswers = $_userIncorrectAnswers;
    }

	/**
     * @param field_type $_marks
     */
    public function setMarks($_marks)
    {
        $this->_marks = $_marks;
    }

	/**
     * @param field_type $_totalMarks
     */
    public function setTotalMarks($_totalMarks)
    {
        $this->_totalMarks = $_totalMarks;
    }

	/**
     * @param field_type $_status
     */
    public function setStatus($_status)
    {
        $this->_status = $_status;
    }

	/**
     * @param field_type $_createdOn
     */
    public function setCreatedOn($_createdOn)
    {
        $this->_createdOn = $_createdOn;
    }

	/**
     * @param field_type $_updatedOn
     */
    public function setUpdatedOn($_updatedOn)
    {
        $this->_updatedOn = $_updatedOn;
    }
    
    public function GenerateArray($values,$type) {

            
        if(array_key_exists('id',$values))
        {
            $this->setId($values['id']);
        }
        if(array_key_exists('first_name',$values))
        {
            $this->setFirstName($values['first_name']);
        }
        if(array_key_exists('last_name',$values))
        {
            $this->setLastName($values['last_name']);
        }
        if(array_key_exists('email_address',$values))
        {
            $this->setEmailAddress($values['email_address']);
        }
        if(array_key_exists('test_id',$values))
        {
            $this->setTestId($values['test_id']);
        }
        if(array_key_exists('questions',$values))
        {
            $this->setQuestions($values['questions']);
        }
        if(array_key_exists('answers',$values))
        {
            $this->setAnswers($values['answers']);
        }
        if(array_key_exists('correct_answers',$values))
        {
            $this->setCorrectAnswers($values['correct_answers']);
        }
        if(array_key_exists('user_correct_question',$values))
        {
            $this->setUserCorrectQuestion($values['user_correct_question']);
        }
        if(array_key_exists('user_correct_answers',$values))
        {
            $this->setUserCorrectAnswers($values['user_correct_answers']);
        }
        if(array_key_exists('user_incorrect_question',$values))
        {
            $this->setUserIncorrectQuestion($values['user_incorrect_question']);
        }
        if(array_key_exists('user_incorrect_answers',$values))
        {
            $this->setUserIncorrectQuestion($values['user_incorrect_answers']);
        }
        if(array_key_exists('marks',$values))
        {
            $this->setMarks($values['marks']);
        }
        if(array_key_exists('total_marks',$values))
        {
            $this->setTotalMarks($values['total_marks']);
        }
        if(array_key_exists('status',$values))
        {
            $this->setStatus($values['status']);
        }
        if(array_key_exists('created_on',$values))
        {
            $this->setCreatedOn($values['created_on']);
        }
        if(array_key_exists('updated_on',$values))
        {
            $this->setUpdatedOn($values['updated_on']);
        }
        
        $userResultArray = array();
        
        if($this->getId() != null)
        {
            $userResultArray["id"] = $this->getId();
        }
        if($this->getFirstName() != null)
        {
            $userResultArray["first_name"] = $this->getFirstName();
        }   
        if($this->getLastName() != null)
        {
            $userResultArray["last_name"] = $this->getLastName();
        }
        if($this->getEmailAddress() != null)
        {
            $userResultArray["email_address"] = $this->getEmailAddress();
        }
        if($this->getTestId() != null)
        {
            $userResultArray["test_id"] = $this->getTestId();
        }
        if($this->getQuestions() != null)
        {
            $userResultArray["questions"] = $this->getQuestions();
        }
        if($this->getAnswers() != null)
        {
            $userResultArray["answers"] = $this->getAnswers();
        }
        if($this->getCorrectAnswers() != null)
        {
            $userResultArray["correct_answers"] = $this->getCorrectAnswers();
        }
        if($this->getUserCorrectQuestion() != null)
        {
            $userResultArray["user_correct_question"] = $this->getUserCorrectQuestion();
        }
        if($this->getUserCorrectAnswers() != null)
        {
            $userResultArray["user_correct_answers"] = $this->getUserCorrectAnswers();
        }
        if($this->getUserIncorrectQuestion() != null)
        {
            $userResultArray["user_incorrect_question"] = $this->getUserIncorrectQuestion();
        }
        if($this->getUserIncorrectAnswers() != null)
        {
            $userResultArray["user_incorrect_answers"] = $this->getUserIncorrectAnswers();
        }
        if($this->getMarks() != null)
        {
            $userResultArray["marks"] = $this->getMarks();
        }
        if($this->getTotalMarks() != null)
        {
            $userResultArray["total_marks"] = $this->getTotalMarks();
        }
        if($this->getStatus() != null)
        {
            $userResultArray["status"] = $this->getStatus();
        }
        if($this->getCreatedOn() != null)
        {
            $userResultArray["created_on"] = $this->getCreatedOn();
        }
        if($this->getUpdatedOn() != null)
        {
            $userResultArray["updated_on"] = $this->getUpdatedOn();
        }
        
        return $userResultArray;
    }
       
}

?>