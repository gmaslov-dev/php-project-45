# Makefile
install:
	composer install

brain-games:
	./bin/brain-games

brain-even:
	./bin/brain-even

brain-calc:
	./bin/brain-calc

brain-gcd:
	./bin/brain-gcd

brain-prime:
	./bin/brain-prime

brain-progression:
	./bin/brain-progression
# проверка валидности composer.json
validate:
	composer validate

lint:
	composer exec --verbose phpcs -- --standard=PSR12 src bin

help:
	$(info brain-even        - четное или нечетное)
	$(info brain-calc        - значение выражения)
	$(info brain-gcd         - поиск НОД)
	$(info brain-prime       - простое ли число)
	$(info brain-progression - недостоющий элмент прогрессии)
