  
<?php
class Usertype extends Eloquent {
    # The guarded properties specifies which attributes should *not* be mass-assignable
    protected $guarded = array('id', 'created_at', 'updated_at');
    /**
    * Book belongs to Author
    * Define an inverse one-to-many relationship.
    */
	/**public function user() {
        return $this->belongsTo('User');
    }*/
    /**
    * Books belong to many Tags
    */
    public function user() {
        return $this->belongsTo('User');
    }   

}
?>