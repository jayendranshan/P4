  
<?php
class Question extends Eloquent {
    # The guarded properties specifies which attributes should *not* be mass-assignable
    protected $guarded = array('id', 'created_at', 'updated_at');
    /**
    * Question belongs to Survey
    * Define an inverse one-to-many relationship.
    */
	public function survey() {
        return $this->belongsTo('Survey');
    }   

}
?>