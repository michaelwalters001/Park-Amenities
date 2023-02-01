<?php
    /**
     * The purpose of this program this to use a class and generate the values breach item. 
     * Using a Constructor to initialize them and or turning values into an array.
     */
    class Park implements JsonSerializable
    {
        private $Long;
        private $Lat;
        private $Description;
        private $Type;
        private $Owership;
        private $Rec_Area;
        private $Object;
        private $Id;

        /**
         * this constuce inialiazes the values for the park info and sets them in a specfic spot
         */
        function __construct($Long, $Lat, $Description, $Type, $Owership, $Rec_Area, $Object, $Id)     
        {             
            $this->Long = $Long;          
            $this->Lat = $Lat;
            $this->Description = $Description;
            $this->Type = $Type;
            $this->Ownership = $Owership;
            $this->Rec_Area = $Rec_Area;
            $this->Object = (Int)$Object;
            $this->Id = (Int)$Id;

        }     
        
        /**
         * this allows the parklist to be encoded
         */
        public function jsonSerialize()     
        {
            return  get_object_vars($this);    
        } 
    }
?>