<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Game;
/**
 * Description of GameFixtures
 *
 * @author Николай
 */
class GameFixtures implements FixtureInterface{
    public function load(ObjectManager $manager) {
        $game1 = (new Game())
                ->setTitle('SimCity')
                ->setCategory('Симулятор')
                ->setDescription('Градостроительный симулятор снова с вами! Создайте город своей мечты')
                ->setPrice(1499.00);
        $manager->persist($game1);
        $game2 = (new Game())
                ->setTitle('TITANFALL')
                ->setCategory('Шутер')
                ->setDescription('Эта игра перенесет вас во вселенную, где малое противопоставляется большому, природа – индустрии, а человек – машине')
                ->setPrice(2299.00);
        $manager->persist($game2);
        $game3 = (new Game())
                ->setTitle('Battlefield 4')
                ->setCategory('Шутер')
                ->setDescription('Battlefield 4 – это определяющий для жанра, полный экшена боевик, известный своей разрушаемостью, равных которой нет')
                ->setPrice(899.40);
        $manager->persist($game3);
        $game4 = (new Game())
                ->setTitle('The Sims 4')
                ->setCategory('Симулятор')
                ->setDescription('В реальности каждому человеку дано прожить лишь одну жизнь. Но с помощью The Sims 4 это ограничение можно снять! 
		Вам решать — где, как и с кем жить, чем заниматься, чем украшать и обустраивать свой дом')
                ->setPrice(15.00);
        $manager->persist($game4);
        $game5 = (new Game())
                ->setTitle('Dark Souls 2')
                ->setCategory('RPG')
                ->setDescription('Продолжение знаменитого ролевого экшена вновь заставит игроков пройти через сложнейшие испытания. Dark Souls II предложит 
		нового героя, новую историю и новый мир. Лишь одно неизменно – выжить в мрачной вселенной Dark Souls очень непросто.')
                ->setPrice(949.00);
        $manager->persist($game5);
        $game6 = (new Game())
                ->setTitle('The Elder Scrolls V: Skyrim')
                ->setCategory('RPG')
                ->setDescription('После убийства короля Скайрима империя оказалась на грани катастрофы. Вокруг претендентов на престол сплотились новые союзы, 
		и разгорелся конфликт. К тому же, как предсказывали древние свитки, в мир вернулись жестокие и беспощадные драконы. Теперь будущее Скайрима и всей 
		империи зависит от драконорожденного — человека, в жилах которого течет кровь легендарных существ.')
                ->setPrice(1399.00);
        $manager->persist($game6);
        $game7 = (new Game())
                ->setTitle('FIFA 14')
                ->setCategory('Симулятор')
                ->setDescription('Достоверный, красивый, эмоциональный футбол! Проверенный временем геймплей FIFA стал ещё лучше благодаря инновациям, поощряющим творческую игру в
		 центре поля и позволяющим задавать её темп.')
                ->setPrice(699.00);
        $manager->persist($game7);
        $game8 = (new Game())
                ->setTitle('Need for Speed Rivals')
                ->setCategory('Симулятор')
                ->setDescription('Забудьте про стандартные режимы игры. Сотрите грань между одиночным и многопользовательским режимом в постоянном соперничестве 
		между гонщиками и полицией. Свободно войдите в мир, в котором ваши друзья уже участвуют в гонках и погонях. ')
                ->setPrice(15.00);
        $manager->persist($game8);
        $game9 = (new Game())
                ->setTitle('Crysis 3')
                ->setCategory('Шутер')
                ->setDescription('Действие игры разворачивается в 2047 году, а вам предстоит выступить в роли Пророка.')
                ->setPrice(1299.00);
        $manager->persist($game9);
        $game10 = (new Game())
                ->setTitle('Dead Space 3')
                ->setCategory('Шутер')
                ->setDescription('В Dead Space 3 Айзек Кларк и суровый солдат Джон Карвер отправляются в космическое путешествие, чтобы узнать о происхождении некроморфов.')
                ->setPrice(499.00);
        $manager->persist($game10);      
        $manager->flush();
    }
}
