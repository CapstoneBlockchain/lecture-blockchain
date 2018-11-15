pragma solidity ^0.4.24;

import "truffle/Assert.sol";
import "truffle/DeployedAddresses.sol";
import "../contracts/LectureCoin.sol";
import "zeppelin-solidity/contracts/math/SafeMath.sol";

contract TestLectureCoin {
    LectureCoin lc = LectureCoin(DeployedAddresses.LectureCoin());

    function testNewMember() public {
        // given
        uint256 INIT_TOKEN = 10;

        // whn
        lc.newMember();

        // then
        uint256 expected = INIT_TOKEN;
        Assert.equal(lc.getUserToken(), expected, "newMemeber test");
    }

    function testInqueryInfo() public {
        // given
        uint256 nowToken = lc.getUserToken();
        uint256 QUERY_COST = 1;

        // when
        lc.inqueryInfo();

        // then
        uint256 expected = nowToken - QUERY_COST;
        Assert.equal(lc.getUserToken(), expected, "inqueryInfo test");
    }

    function testCompleteMatching() public {
        // given
        address aMember = 0x0;
        uint256 nowToken = lc.getUserToken();
        uint256 MATCH_REWARD = 2;

        // when
        lc.completeMatching(aMember);

        // then
        uint256 expected = nowToken + MATCH_REWARD;
        Assert.equal(lc.getUserToken(), expected, "completeMatching test");
    }

    function testCounsel() public {
        // given
        address aMember = 0x0;
        uint256 nowToken = lc.getUserToken();
        uint256 COUNSEL_REWARD = 2;

        // when
        lc.counsel(aMember);

        // then
        uint256 expected = nowToken + COUNSEL_REWARD;
        Assert.equal(lc.getUserToken(), expected, "counsel test");
    }

    function testUseItem() public {
        // given
        uint256 nowToken = lc.getUserToken();

        // when
        uint256 price = 4;
        lc.useItem(price);

        // then
        uint256 expected = nowToken - price;
        Assert.equal(lc.getUserToken(), expected, "useItem test");
    }

    function testEvaluate() public {
        // given
        address aMember = 0x0;
        uint256 nowToken = lc.getUserToken();
        uint256 EVAL_REWARD = 5;

        // when
        lc.evaluate(aMember, 3);

        // then
        uint256 expected = nowToken + EVAL_REWARD;
        Assert.equal(lc.getUserToken(), expected, "evaluate test");
    }
}