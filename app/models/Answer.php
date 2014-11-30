  
<?php
class Answer extends Eloquent {
    # The guarded properties specifies which attributes should *not* be mass-assignable
    protected $guarded = array('id', 'created_at', 'updated_at');
    /**
    * Answer belongs to Question
    * Define an inverse one-to-many relationship.
    */
	public function question() {
        return $this->belongsTo('Question');
    } 


    /**
    * Answer belongs to Survey
    * Define an inverse one-to-many relationship.
    */
    public function survey() {
        return $this->belongsTo('Survey');
    } 

}
?>