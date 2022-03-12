a\_ pour assert
fini par ()
https://phpunit.readthedocs.io/fr/latest/assertions.html

Sorted by Groups

Utilisation approprie

---

TEST FAIL
SIGNALE UNE ERREUR identifiée par $message si...

---

Usage:
eg: assertArrayHasKey(mixed $key, array $array[, string $message = ''])

- a_ArrayHasKey | si le tableau $array ne dispose pas de la clé $key
- a_ArrayNotHasKey

---

Usage:
eg: assertContains(mixed $needle, Iterator|array $haystack[, string $message = ''])

- a_Contains | si $needle n’est pas un élément de $haystack.
- a_AttributeContains
- a_NotContains | si $needle n’est pas un élément de $haystack.
- a_AttributeNotContains
- a_ContainsOnly
- a_AttributeContainsOnly
- a_NotContainsOnly
- a_AttributeNotContainsOnly

---

Usage:
eg: assertEquals(mixed $expected, mixed $actual[, string $message = ''])

- a_Equals | si les deux variables $expected et $actual ne sont pas égales.
- a_AttributeEquals
- a_NotEquals
- a_AttributeNotEquals

---

Usage:
eg: assertEmpty(mixed $actual[, string $message = ''])

- a_Empty | si $actual n’est pas vide.
- a_AttributeEmpty
- a_NotEmpty
- a_AttributeNotEmpty

---

Usage:
eg: assertGreaterThan(mixed $expected, mixed $actual[, string $message = ''])

- a_GreaterThan | si la valeur de $actual n’est pas plus élevée que la valeur de $expected.
- a_AttributeGreaterThan
- a_GreaterThanOrEqual
- a_AttributeGreaterThanOrEqual
- a_LessThan
- a_AttributeLessThan
- a_LessThanOrEqual
- a_AttributeLessThanOrEqual

---

Usage:

- a_FileEquals
- a_FileNotEquals

---

Usage:

- a_StringEqualsFile
- a_StringNotEqualsFile
- a_FileExists
- a_FileNotExists

---

Usage:
Constraints

- a_True
- a_False
- a_NotNull
- a_Null

---

Usage:
eg: assertClassHasAttribute(string $attributeName, string $className[, string $message = ''])

- a_ClassHasAttribute | si $className::attributeName n’existe pas.
- a_ClassNotHasAttribute
- a_ClassHasStaticAttribute
- a_ClassNotHasStaticAttribute
- a_ObjectHasAttribute
- a_ObjectNotHasAttribute

---

Usage:
eg: assertSame(mixed $expected, mixed $actual[, string $message = ''])

- a_Same | si les deux variables $expected et $actual ne sont pas du même type et n’ont pas la même valeur.
- a_AttributeSame
- a_NotSame
- a_AttributeNotSame

---

Usage:
assertSelectorTextContains()

---

Usage:
eg:assertInstanceOf($expected, $actual[, $message = ''])

- a_InstanceOf | si $actual n’est pas une instance de $expected
- a_AttributeInstanceOf
- a_NotInstanceOf
- a_AttributeNotInstanceOf

---

Usage:
eg: assertInternalType($expected, $actual[, $message = ''])

- a_InternalType | si $actual n’est pas du type $expected
- a_AttributeInternalType
- a_NotInternalType
- a_AttributeNotInternalType
- a_Type
- a_AttributeType
- a_NotType
- a_AttributeNotType

---

Usage:
eg: assertRegExp(string $pattern, string $string[, string $message = ''])

- a_RegExp | si $string ne correspond pas a l’expression régulière
- a_NotRegExp

---

- a_StringMatchesFormat
- a_StringNotMatchesFormat
- a_StringMatchesFormatFile
- a_StringNotMatchesFormatFile
- a_StringStartsWith
- a_StringStartsNotWith
- a_StringEndsWith
- a_StringEndsNotWith

---

- a_XmlFileEqualsXmlFile
- a_XmlFileNotEqualsXmlFile
- a_XmlStringEqualsXmlFile
- a_XmlStringNotEqualsXmlFile
- a_XmlStringEqualsXmlString
- a_XmlStringNotEqualsXmlString

---

- a_EqualXMLStructure

---

- a_SelectCount
- a_SelectRegExp
- a_SelectEquals

---

- a_Tag
- a_NotTag
- a_That

---

- logicalAnd
- logicalOr
- logicalNot
- logicalXor
- anything
- isTrue
- isFalse
- isNull
- attribute
- contains
- containsOnly
- arrayHasKey
- equalTo
- attributeEqualTo
- isEmpty
- fileExists
- greaterThan
- greaterThanOrEqual
- classHasAttribute
- classHasStaticAttribute
- objectHasAttribute
- identicalTo
- isInstanceOf
- isType
- lessThan
- lessThanOrEqual
- matchesRegularExpression
- matches
- stringStartsWith
- stringContains
- stringEndsWith

=============================
CRAWLER (DomCrawler)

---

FILTER (Nodefiltering)
Toute les methods filter(node target)->methodName()

->count()
->text()

FILTER (Nodetraversing)
->first()

Accessing Node Values
->nodeName()
->text()
