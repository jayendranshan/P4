  
<?php
class Survey extends Eloquent {
    # The guarded properties specifies which attributes should *not* be mass-assignable
    protected $guarded = array('id', 'created_at', 'updated_at');

    /**
    * Books belong to many Tags
    */
    public function users() {
        return $this->belongsToMany('User');
    }   

    public function question() {
        # Survey has many questions
        # Define a one-to-many relationship.
        return $this->hasMany('Question');
    }

    public function answer() {
        # Survey has many answers
        # Define a one-to-many relationship.
        return $this->hasMany('Answer');
    }

}
?>
