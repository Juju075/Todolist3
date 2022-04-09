a\_ pour assert
fini par ()
https://phpunit.readthedocs.io/fr/latest/assertions.html
https://phpunit.readthedocs.io/fr/latest/assertions.html?highlight=assert (Fr)

Sorted by Groups

Utilisation approprie

---

TEST FAIL
SIGNALE UNE ERREUR identifiée par $message si...

Signale une erreur identifiée par $message

Fail: si le tableau $array ne dispose pas de la clé $key.

Fail: si $className::attributeName n’existe pas.
Fail: si $array ne contient pas le $subset.
Fail: si $className::attributeName n’existe pas.
Fail: si $needle n’est pas un élément de $haystack.
Fail: si $needle n’est pas une sous-chaine de $haystack.
Fail: si $haystack ne contient pas seulement des valeurs du type $type.
Fail: si $haystack ne contient pas seulement des intance de la classe $classname.
Fail: si le nombre d’éléments dans $haystack n’est pas $expectedCount.

Fail: si le répertoire spécifié par $directory n’existe pas.
Fail: si le répertoire spécifié par $directory n’est pas un répertoire ou n’est pas accessible en lecture.
Fail: si le répertoire spécifié par $directory n’est pas un répertoire accessible en écriture.

Fail: si $actual n’est pas vide.

Fail: si la structure XML du DOMElement dans $actualElement n’est pas égale à la structure XML du DOMElement dans $expectedElement.

Fail: si les deux variables $expected et $actual ne sont pas égales.

Fail: si la forme canonique sans commentaires des documents XML représentés par les deux objets DOMDocument $expected et $actual ne sont pas égaux.

Fail: si les deux objets $expected et $actual n’ont pas les attributs avec des valeurs égales.
Fail: si les deux tableaux $expected et $actual ne sont pas égaux.

Fail: si $condition est true.

Fail: si le fichier spécifié par $expected n’a pas les mêmes contenus que le fichier spécifié par $actual.
Fail: si le fichier spécifié par $filename n’existe pas.
Fail: si le fichier spécifié par $filename n’est pas un fichier ou n’est pas accessible en lecture.
Fail: si le fichier spécifié par $filename n’est pas un fichier ou n’est pas accessible en écriture.

Fail: si la valeur de $actual n’est pas plus élevée que la valeur de $expected.
Fail: si la valeur de $actual n’est pas plus grande ou égale à la valeur de $expected.

Fail: si $variable n’est pas INF.

Fail: si $actual n’est pas une instance de $expected.
Fail: si $actual n’est pas du type $expected.

Fail: si le fichier ou le répertoire spécifié par $filename n’est pas accessible en lecture.
Fail: si le fichier ou le répertoire spécifié par $filename n’est pas accessible en écriture.

Fail: si la valeur de $actualFile ne correspond pas à la valeur de $expectedFile.
Fail: si la valeur de $actualJson ne correspond pas à la valeur de $expectedFile.
Fail: si la valeur de $actualJson ne correspond pas à la valeur de $expectedJson.
Fail: si la valeur de $actual n’est pas plus petit que $expected.
Fail: si la valeur de $actual n’est pas plus petite ou égale à la valeur de $expected.

Fail: si $variable n’est pas NAN.
Fail: si $variable n’est pas null.

Fail: si $object->attributeName n’existe pas.

Fail: si $string ne correspond pas a l’expression régulière $pattern.
Fail: si $string ne correspond pas à la chaine $format.

Fail: si les deux variables $expected et $actual ne sont pas du même type et n’ont pas la même valeur.
Fail: si les deux variables $expected et $actual ne référencent pas le même objet.

Fail: si $string ne termine pas par $suffix.

Fail: le fichier spécifié par $expectedFile n’a pas $actualString comme contenu.

Fail: si $string ne commence pas par $prefix.

Fail: si $condition est false.

Fail: si l’écart absolu entre les deux nombres réels $expected et $actual est plus grand que $delta.
Si la difference absolue entre les deux nombre flotant $expected et $actual est inférieur ou égal à $delta, l’assertion passera.

---

Type String

## Usage:

## Fail: si le tableau $array ne dispose pas de la clé $key.

eg: assertArrayHasKey(mixed $key, array $array[, string $message = ''])

- a_ArrayHasKey | si le tableau $array ne dispose pas de la clé $key
- a_ArrayNotHasKey

---

Type String

## Usage: /// Utilisé

## Fail: si $needle n’est pas un élément de $haystack.

eg: assertContains(mixed $needle, Iterator|array $haystack[, string $message = ''])

- a_Contains | si $needle n’est pas un élément de $haystack.
- a_AttributeContains
- a_NotContains | si $needle n’est pas un élément de $haystack.
- a_AttributeNotContains
- a_ContainsOnly
- a_AttributeContainsOnly
- a_NotContainsOnly
- a_AttributeNotContainsOnly

--- OK
Type String

## Usage: /// Utilisé

## Fail: si les deux variables $expected et $actual ne sont pas égales.

eg: assertEquals(mixed $expected, mixed $actual[, string $message = ''])

- a_Equals | si les deux variables $expected et $actual ne sont pas égales.
- a_AttributeEquals
- a_NotEquals
- a_AttributeNotEquals

---

Type String

## Usage:

## Fail: si $actual n’est pas vide.

eg: assertEmpty(mixed $actual[, string $message = ''])

- a_Empty | si $actual n’est pas vide.
- a_AttributeEmpty
- a_NotEmpty
- a_AttributeNotEmpty

---

Type String

## Usage:La valeur est x en quantité.

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

## Usage:

- a_FileEquals
- a_FileNotEquals

---

## Usage:

- a_StringEqualsFile
- a_StringNotEqualsFile
- a_FileExists
- a_FileNotExists

---

## Usage:

Constraints

- a_True
- a_False
- a_NotNull
- a_Null

---

## Usage:

eg: assertClassHasAttribute(string $attributeName, string $className[, string $message = ''])

- a_ClassHasAttribute | si $className::attributeName n’existe pas.
- a_ClassNotHasAttribute
- a_ClassHasStaticAttribute
- a_ClassNotHasStaticAttribute
- a_ObjectHasAttribute
- a_ObjectNotHasAttribute

---

## Usage:

eg: assertSame(mixed $expected, mixed $actual[, string $message = ''])

- a_Same | si les deux variables $expected et $actual ne sont pas du même type et n’ont pas la même valeur.
- a_AttributeSame
- a_NotSame
- a_AttributeNotSame

---

## Usage:

assertSelectorTextContains()

---

## Usage: On s'attend à un type...

eg:assertInstanceOf($expected, $actual[, $message = ''])

- a_InstanceOf | si $actual n’est pas une instance de $expected
- a_AttributeInstanceOf
- a_NotInstanceOf
- a_AttributeNotInstanceOf

---

## Usage:

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

## Usage:

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

## CRAWLER (DomCrawler)

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

https://symfony.com/doc/current/testing.html (Assertion usage)

Symfony provides useful shortcut methods for the most common cases.

Response Assertions:
Request Assertions:
Browser Assertions:
Crawler Assertions:
Mailer Assertions:

## Ce qui ressort le plus dans mes tests.

assertResponseStatusCodeSame

assertNotTrue() est l’inverse de cette assertion et prend les mêmes arguments.
