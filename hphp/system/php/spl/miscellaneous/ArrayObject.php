<?php

// This doc comment block generated by idl/sysdoc.php
/**
 * ( excerpt from http://php.net/manual/en/class.arrayobject.php )
 *
 * This class allows objects to work as arrays.
 *
 */
class ArrayObject implements IteratorAggregate, ArrayAccess,
                             Serializable, Countable {
  use StrictKeyedIterable;

  const integer STD_PROP_LIST = 1;
  const integer ARRAY_AS_PROPS = 2;

  /*
   * Note: don't add type annotations to these properties---this class
   * contains code that does unset($this->$foo) in its magic unsetter,
   * which could unset any of these properties.  The types are not
   * statically knowable.
   */
  private $storage = array();
  private $flags = 0;
  private $iteratorClass = 'ArrayIterator';

  /**
   * ( excerpt from http://php.net/manual/en/arrayobject.construct.php )
   *
   * This constructs a new array object.
   *
   * @input      mixed   The input parameter accepts an array or an Object.
   * @flags      ?int   Flags to control the behaviour of the ArrayObject
   *                     object. See ArrayObject::setFlags().
   * @iterator_class
   *             string   Specify the class that will be used for iteration of
   *                     the ArrayObject object.
   *
   * @return     mixed   Returns an ArrayObject object on success.
   */
  public function __construct($input = null,
                               ?int $flags = null,
                               string $iterator_class = "ArrayIterator") {
    if($input instanceof ArrayObject) {
      $flags = ($flags === null) ? $input->getFlags() : $flags;
    }
    if (!$input) {
      $input = array();
    }
    $this->check_array_object_or_iterator($input);
    $this->flags = ($flags === null) ? 0 : $flags;
    $this->iteratorClass = $iterator_class;
  }

  // This doc comment block generated by idl/sysdoc.php
  /**
   * ( excerpt from http://php.net/manual/en/arrayobject.append.php )
   *
   * Appends a new value as the last element.
   *
   * This method cannot be called when the ArrayObject was constructed from
   * an object. Use ArrayObject::offsetSet() instead.
   *
   * @value      mixed   The value being appended.
   *
   * @return     mixed   No value is returned.
   */
  public function append($value) {
    if (!$this->isArray()) {
      throw new Exception(
        'Cannot append properties to objects, '.
        'use ArrayObject::offsetSet() instead'
      );
    }
    $this->offsetSet(null, $value);
  }

  // This doc comment block generated by idl/sysdoc.php
  /**
   * ( excerpt from http://php.net/manual/en/arrayobject.asort.php )
   *
   * Sorts the entries such that the keys maintain their correlation with
   * the entries they are associated with. This is used mainly when sorting
   * associative arrays where the actual element order is significant.
   *
   * @return     mixed   No value is returned.
   */
  public function asort($sort_flags = 0) {
    return asort($this->storage, $sort_flags);
  }

  // This doc comment block generated by idl/sysdoc.php
  /**
   * ( excerpt from http://php.net/manual/en/arrayobject.count.php )
   *
   * Get the number of public properties in the ArrayObject.
   *
   * @return     mixed   The number of public properties in the ArrayObject.
   *
   *                     When the ArrayObject is constructed from an array
   *                     all properties are public.
   */
  public function count() {
    return count($this->storage);
  }

  // This doc comment block generated by idl/sysdoc.php
  /**
   * ( excerpt from http://php.net/manual/en/arrayobject.exchangearray.php )
   *
   * Exchange the current array with another array or object.
   *
   * @input      mixed   The new array or object to exchange with the current
   *                     array.
   *
   * @return     mixed   Returns the old array.
   */
  public function exchangeArray($input) {
    $old = $this->getArrayCopy();
    $this->check_array_object_or_iterator($input);
    return $old;
  }

  // This doc comment block generated by idl/sysdoc.php
  /**
   * ( excerpt from http://php.net/manual/en/arrayobject.getarraycopy.php )
   *
   * Exports the ArrayObject to an array.
   *
   * @return     mixed   Returns a copy of the array. When the ArrayObject
   *                     refers to an object an array of the public
   *                     properties of that object will be returned.
   */
  public function getArrayCopy() {
    return (array) $this->storage;
  }

  // This doc comment block generated by idl/sysdoc.php
  /**
   * ( excerpt from http://php.net/manual/en/arrayobject.getflags.php )
   *
   * Gets the behavior flags of the ArrayObject. See the
   * ArrayObject::setFlags method for a list of the available flags.
   *
   * @return     mixed   Returns the behavior flags of the ArrayObject.
   */
  public function getFlags() {
    return $this->flags;
  }

  // This doc comment block generated by idl/sysdoc.php
  /**
   * ( excerpt from http://php.net/manual/en/arrayobject.getiterator.php )
   *
   * Create a new iterator from an ArrayObject instance.
   *
   * @return     mixed   An iterator from an ArrayObject.
   */
  public function getIterator() {
    $class = $this->iteratorClass;
    return new $class($this->storage, $this->flags);
  }

  // This doc comment block generated by idl/sysdoc.php
  /**
   * ( excerpt from http://php.net/manual/en/arrayobject.getiteratorclass.php
   * )
   *
   * Gets the class name of the array iterator that is used by
   * ArrayObject::getIterator().
   *
   * @return     mixed   Returns the iterator class name that is used to
   *                     iterate over this object.
   */
  public function getIteratorClass() {
    return $this->iteratorClass;
  }

  // This doc comment block generated by idl/sysdoc.php
  /**
   * ( excerpt from http://php.net/manual/en/arrayobject.ksort.php )
   *
   * Sorts the entries by key, maintaining key to entry correlations. This
   * is useful mainly for associative arrays.
   *
   * @return     mixed   No value is returned.
   */
  public function ksort($sort_flags = 0) {
    return ksort($this->storage, $sort_flags);
  }

  // This doc comment block generated by idl/sysdoc.php
  /**
   * ( excerpt from http://php.net/manual/en/arrayobject.natcasesort.php )
   *
   * This method is a case insensitive version of ArrayObject::natsort.
   *
   * This method implements a sort algorithm that orders alphanumeric
   * strings in the way a human being would while maintaining key/value
   * associations. This is described as a "natural ordering".
   *
   * @return     mixed   No value is returned.
   */
  public function natcasesort() {
    return natcasesort($this->storage);
  }

  // This doc comment block generated by idl/sysdoc.php
  /**
   * ( excerpt from http://php.net/manual/en/arrayobject.natsort.php )
   *
   * This method implements a sort algorithm that orders alphanumeric
   * strings in the way a human being would while maintaining key/value
   * associations. This is described as a "natural ordering". An example of
   * the difference between this algorithm and the regular computer string
   * sorting algorithms (used in ArrayObject::asort) method can be seen in
   * the example below.
   *
   * @return     mixed   No value is returned.
   */
  public function natsort() {
    return natsort($this->storage);
  }

  // This doc comment block generated by idl/sysdoc.php
  /**
   * ( excerpt from http://php.net/manual/en/arrayobject.offsetexists.php )
   *
   *
   * @index      mixed   The index being checked.
   *
   * @return     mixed   TRUE if the requested index exists, otherwise FALSE
   */
  public function offsetExists($index) {
    if ($this->isArray()) {
      return array_key_exists($index, $this->storage);
    } else {
      return property_exists($this->storage, $index);
    }
  }

  // This doc comment block generated by idl/sysdoc.php
  /**
   * ( excerpt from http://php.net/manual/en/arrayobject.offsetget.php )
   *
   *
   * @index      mixed   The index with the value.
   *
   * @return     mixed   The value at the specified index or NULL.
   */
  public function offsetGet($index) {
    if ($this->isArray()) {
      return $this->storage[$index];
    } else {
      $obj = $this->storage;
      return $obj->$index;
    }
  }

  // This doc comment block generated by idl/sysdoc.php
  /**
   * ( excerpt from http://php.net/manual/en/arrayobject.offsetset.php )
   *
   * Sets the value at the specified index to newval.
   *
   * @index      mixed   The index being set.
   * @newval     mixed   The new value for the index.
   *
   * @return     mixed   No value is returned.
   */
  public function offsetSet($index, $newval) {
    if ($this->isArray()) {
      if ($index === null) {
        $this->storage[] = $newval;
      } else {
        $this->storage[$index] = $newval;
      }
    } else {
      $obj = $this->storage;
      $obj->$index = $newval;
    }
  }

  // This doc comment block generated by idl/sysdoc.php
  /**
   * ( excerpt from http://php.net/manual/en/arrayobject.offsetunset.php )
   *
   * Unsets the value at the specified index.
   *
   * @index      mixed   The index being unset.
   *
   * @return     mixed   No value is returned.
   */
  public function offsetUnset($index) {
    if (!$this->offsetExists($index)) {
      [][$index]; // Try to access wrong key so a Notice is raised
      return;
    }
    if ($this->isArray()) {
      unset($this->storage[$index]);
    } else {
      $obj = $this->storage;
      unset($obj->$index);
    }
  }

  // This doc comment block generated by idl/sysdoc.php
  /**
   * ( excerpt from http://php.net/manual/en/arrayobject.serialize.php )
   *
   * Serializes an ArrayObject. Warning: This function is currently not
   * documented; only its argument list is available.
   *
   * @return     mixed   The serialized representation of the ArrayObject.
   */
  public function serialize() {
    /**
     * This implementation is not compatible with PHP's. We cannot implement it
     * because we lack a way to unserialize inline.

      Correct implementation:

      $props =
        array_diff_key(get_object_vars($this), get_class_vars('ArrayObject'));

      return
        'x:' . serialize($this->flags) .
        serialize($this->storage) . ';' .
        'm:' . serialize($props);
     */

    return serialize(get_object_vars($this));

  }

  // This doc comment block generated by idl/sysdoc.php
  /**
   * ( excerpt from http://php.net/manual/en/arrayobject.setflags.php )
   *
   * Set the flags that change the behavior of the ArrayObject.
   *
   * @flags      mixed   The new ArrayObject behavior. It takes on either a
   *                     bitmask, or named constants. Using named constants
   *                     is strongly encouraged to ensure compatibility for
   *                     future versions.
   *
   *                     The available behavior flags are listed below. The
   *                     actual meanings of these flags are described in the
   *                     predefined constants. ArrayObject behavior flags
   *                     value constant 1 ArrayObject::STD_PROP_LIST 2
   *                     ArrayObject::ARRAY_AS_PROPS
   *
   * @return     mixed   No value is returned.
   */
  public function setFlags(int $flags) {
    $this->flags = $flags;
  }

  // This doc comment block generated by idl/sysdoc.php
  /**
   * ( excerpt from http://php.net/manual/en/arrayobject.setiteratorclass.php
   * )
   *
   * Sets the classname of the array iterator that is used by
   * ArrayObject::getIterator().
   *
   * @iterator_class
   *             mixed   The classname of the array iterator to use when
   *                     iterating over this object.
   *
   * @return     mixed   No value is returned.
   */
  public function setIteratorClass(string $iterator_class) {
    $this->iteratorClass = $iterator_class;
  }

  // This doc comment block generated by idl/sysdoc.php
  /**
   * ( excerpt from http://php.net/manual/en/arrayobject.uasort.php )
   *
   * This function sorts the entries such that keys maintain their
   * correlation with the entry that they are associated with, using a
   * user-defined comparison function.
   *
   * This is used mainly when sorting associative arrays where the actual
   * element order is significant.
   *
   * @cmp_function
   *             mixed   Function cmp_function should accept two parameters
   *                     which will be filled by pairs of entries. The
   *                     comparison function must return an integer less
   *                     than, equal to, or greater than zero if the first
   *                     argument is considered to be respectively less than,
   *                     equal to, or greater than the second.
   *
   * @return     mixed   No value is returned.
   */
  public function uasort($cmp_function) {
    uasort($this->storage, $cmp_function);
  }

  // This doc comment block generated by idl/sysdoc.php
  /**
   * ( excerpt from http://php.net/manual/en/arrayobject.uksort.php )
   *
   * This function sorts the keys of the entries using a user-supplied
   * comparison function. The key to entry correlations will be maintained.
   *
   * @cmp_function
   *             mixed   The callback comparison function.
   *
   *                     Function cmp_function should accept two parameters
   *                     which will be filled by pairs of entry keys. The
   *                     comparison function must return an integer less
   *                     than, equal to, or greater than zero if the first
   *                     argument is considered to be respectively less than,
   *                     equal to, or greater than the second.
   *
   * @return     mixed   No value is returned.
   */
  public function uksort($cmp_function) {
    uksort($this->storage, $cmp_function);
  }

  // This doc comment block generated by idl/sysdoc.php
  /**
   * ( excerpt from http://php.net/manual/en/arrayobject.unserialize.php )
   *
   * Unserializes a serialized ArrayObject. Warning: This function is
   * currently not documented; only its argument list is available.
   *
   * @serialized mixed   The serialized ArrayObject.
   *
   * @return     mixed   The unserialized ArrayObject.
   */
  public function unserialize($serialized) {
    if (empty($serialized)) {
      throw new UnexpectedValueException(
        'Empty serialized string cannot be empty'
      );
    }

    $data = unserialize($serialized);
    foreach ($data as $prop => $value) {
      $this->$prop = $value;
    }

  }

  public function __set ($name, $value) {
    if (!$this->hasProps()) {
      $this->$name = $value;
    } else {
      return $this->offsetSet($name, $value);
    }
  }

  public function __get (string $name) {
    if (!$this->hasProps()) {
      return $this->$name;
    } else {
      return $this->offsetGet($name);
    }
  }

  public function __isset (string $name) {
    if (!$this->hasProps()) {
      return isset($this->$name);
    } else {
      return $this->offsetExists($name);
    }
  }

  public function __unset (string $name) {
    if (!$this->hasProps()) {
      unset($this->$name);
    } else {
      return $this->offsetUnset($name);
    }
  }

  private function isArray() {
    return is_array($this->storage);
  }

  private function hasProps() {
    return $this->flags & self::ARRAY_AS_PROPS;
  }

  private function check_array_object_or_iterator($input) {
    if (!is_array($input) && gettype($input) !== 'object') {
      $this->storage = array();
      throw new InvalidArgumentException(
        "Passed variable is not an array or object, using empty array instead"
      );
    } else if (($input instanceof ArrayObject) ||
               ($input instanceof ArrayIterator)) {
      $this->storage = $input->getArrayCopy();
    } else {
      $this->storage = $input;
    }
  }

  public function __debugInfo() {
    return array_merge(
      array_diff_key(get_object_vars($this), get_class_vars('ArrayObject')),
      array(
        "\0ArrayObject\0storage" => $this->storage,
      ),
    );
  }

  /*
   * Magic function called when invoking reset($arrayObject)
   */
  private function __reset() {
    if($this->flags & self::STD_PROP_LIST) {
      return false;
    }
    reset($this->storage);
  }

  /*
   * Magic function called when invoking current($arrayObject)
   */
  private function __current() {
    if($this->flags & self::STD_PROP_LIST) {
      return false;
    }
    return current($this->storage);
  }

  /*
   * Magic function called when invoking key($arrayObject)
   */
  private function __key() {
    if($this->flags & self::STD_PROP_LIST) {
      return null;
    }
    return key($this->storage);
  }

  /*
   * Magic function called when invoking next($arrayObject)
   */
  private function __next() {
    if($this->flags & self::STD_PROP_LIST) {
      return false;
    }
    return next($this->storage);
  }

  /*
   * Magic function called when invoking prev($arrayObject)
   */
  private function __prev() {
    if($this->flags & self::STD_PROP_LIST) {
      return false;
    }
    return prev($this->storage);
  }

  /*
   * Magic function called when invoking each($arrayObject)
   */
  private function __each() {
    if($this->flags & self::STD_PROP_LIST) {
      return false;
    }
    return each($this->storage);
  }

  /*
   * Magic function called when invoking end($arrayObject)
   */
  private function __end() {
    if($this->flags & self::STD_PROP_LIST) {
      return false;
    }
    return end($this->storage);
  }
}
